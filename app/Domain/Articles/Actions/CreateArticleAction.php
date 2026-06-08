<?php

namespace App\Domain\Articles\Actions;

use App\Domain\Articles\Models\Article;
use App\Domain\Core\Helpers\WebpConverter;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class CreateArticleAction
{
    /**
     * Executes the creation of an article.
     *
     * @param array $data
     * @param mixed $imageFile
     * @return Article
     */
    public function execute(array $data, $imageFile): Article
    {
        $slug = Str::slug($data['title']);
        $originalSlug = $slug;
        $count = 1;
        while (Article::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $imagePath = '';
        if ($imageFile) {
            $imagePath = WebpConverter::convertAndStore($imageFile, 'articles');
        }

        $status = $data['status'] ?? 'published';
        $publishedAt = null;
        if ($status === 'published') {
            $publishedAt = now();
        } elseif ($status === 'scheduled') {
            $publishedAt = isset($data['published_at']) ? Carbon::parse($data['published_at']) : now();
        }

        $article = Article::create([
            'title' => $data['title'],
            'slug' => $slug,
            'subtitle' => $data['subtitle'] ?? null,
            'body' => $data['body'],
            'image_path' => $imagePath,
            'author_id' => $data['author_id'],
            'category_id' => $data['category_id'],
            'reading_time' => $data['reading_time'] ?? '5 min',
            'status' => $status,
            'published_at' => $publishedAt,
            'featured' => isset($data['featured']) ? (bool)$data['featured'] : false,
            'meta_title' => $data['meta_title'] ?? null,
            'meta_description' => $data['meta_description'] ?? null,
            'og_image' => $imagePath,
        ]);

        if (isset($data['tags'])) {
            $tagsArray = is_array($data['tags']) ? $data['tags'] : explode(',', $data['tags']);
            $tagIds = [];
            foreach ($tagsArray as $tagName) {
                $tagName = trim($tagName);
                if ($tagName === '') continue;
                $tag = \App\Domain\Core\Models\Tag::firstOrCreate(
                    ['slug' => Str::slug($tagName)],
                    ['name' => $tagName]
                );
                $tagIds[] = $tag->id;
            }
            $article->tags()->sync($tagIds);
        }

        // Clear web cache to reflect updates
        Cache::flush();

        return $article;
    }
}
