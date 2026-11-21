<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController
{
    public function approve(Comment $comment)
    {
        Gate::authorize('update', $comment);

        $comment->update(['is_approved' => true]);

        return back()->with('success', 'Комментарий одобрен!');
    }

    public function moderation()
    {
        Gate::authorize('moderate-comments');

        $comments = Comment::where('is_approved', false)
            ->with(['user', 'article'])
            ->latest()
            ->get();

        return view('comments.moderation', compact('comments'));
    }

    public function reject(Comment $comment)
    {
        Gate::authorize('delete', $comment);

        $comment->delete();

        return back()->with('success', 'Комментарий отклонён!');
    }
    // Добавление комментария
    // Добавление комментария
    public function store(Request $request, $articleId)
    {
        Gate::authorize('create', Comment::class);

        $article = Article::findOrFail($articleId);

        $validated = $request->validate([
            'content' => 'required|string|max:2000',
        ]);

        $article->comments()->create([
            'user_id' => $request->user()->id,
            'content' => $validated['content'],
            'is_approved' => false,
        ]);

        return redirect()
            ->route('articles.show', $article->id)
            ->with('success', 'Комментарий отправлен и ожидает модерации!');
    }

    // Удаление комментария
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        Gate::authorize('delete', $comment);

        $articleId = $comment->article_id;

        $comment->delete();

        return redirect()
            ->route('articles.show', $articleId)
            ->with('success', 'Комментарий успешно удалён!');
    }
}
