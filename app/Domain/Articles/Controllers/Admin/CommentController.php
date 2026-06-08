<?php

namespace App\Domain\Articles\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Domain\Articles\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CommentController extends Controller
{
    /**
     * Display a listing of the comments.
     */
    public function index(Request $request)
    {
        $status = $request->input('status', 'all');

        $query = Comment::with('article')->latest();

        if ($status === 'pending') {
            $query->where('is_approved', false);
        } elseif ($status === 'approved') {
            $query->where('is_approved', true);
        }

        $comments = $query->paginate(20)->withQueryString();

        return view('admin.comments.index', compact('comments', 'status'));
    }

    /**
     * Approve the specified comment.
     */
    public function approve(Comment $comment)
    {
        $comment->update([
            'is_approved' => true
        ]);

        // Clear cache for this article and web views
        if ($comment->article) {
            Cache::forget("article_page_{$comment->article->slug}");
        }
        Cache::flush();

        return back()->with('success', 'Comentário aprovado com sucesso!');
    }

    /**
     * Remove the specified comment from storage.
     */
    public function destroy(Comment $comment)
    {
        $article = $comment->article;
        $comment->delete();

        // Clear cache for this article and web views
        if ($article) {
            Cache::forget("article_page_{$article->slug}");
        }
        Cache::flush();

        return back()->with('success', 'Comentário eliminado com sucesso!');
    }
}
