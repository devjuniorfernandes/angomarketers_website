<?php

namespace App\Domain\Articles\Actions;

use App\Domain\Articles\Models\Article;
use App\Domain\Core\Helpers\WebpConverter;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class UpdateArticleAction
{
    /**
     * Executes the update of an article.
     *
     * @param Article $article
     * @param array $data
     * @param mixed $imageFile
     * @return Article
     */
    public function execute(Article $article, array $data, $imageFile = null): Article
    {
        // If title changed, update slug
        if ($data['title'] !== $article->title) {
            $slug = Str::slug($data['title']);
            $originalSlug = $slug;
            $count = 1;
            while (Article::where('slug', $slug)->where('id', '!=', $article->id)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }
            $article->slug = $slug;
        }

        if ($imageFile) {
            // Delete old image if it is stored in public disk
            if ($article->image_path && str_starts_with($article->image_path, '/storage/')) {
                $oldPath = str_replace('/storage/', '', $article->image_path);
                Storage::disk('public')->delete($oldPath);
            }
            $article->image_path = WebpConverter::convertAndStore($imageFile, 'articles');
        }

        $status = $data['status'] ?? $article->status;
        
        // Handle transitions of status
        if ($status === 'published' && $article->status !== 'published') {
            $article->published_at = now();
        } elseif ($status === 'scheduled') {
            $article->published_at = isset($data['published_at']) ? Carbon::parse($data['published_at']) : ($article->published_at ?? now());
        } elseif ($status === 'draft') {
            $article->published_at = null;
        }

        $article->update([
            'title' => $data['title'],
            'subtitle' => $data['subtitle'] ?? null,
            'body' => $data['body'],
            'author_id' => $data['author_id'],
            'category_id' => $data['category_id'],
            'reading_time' => $data['reading_time'] ?? '5 min',
            'status' => $status,
            'featured' => isset($data['featured']) ? (bool)$data['featured'] : false,
            'meta_title' => $data['meta_title'] ?? null,
            'meta_description' => $data['meta_description'] ?? null,
            'og_image' => $article->image_path,
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
        } else {
            $article->tags()->detach();
        }

        // Clear web cache to reflect updates
        Cache::flush();

        return $article;
    }
}
