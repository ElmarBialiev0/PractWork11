<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController
{
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
        ]);

        return redirect()
            ->route('articles.show', $article->id)
            ->with('success', 'Комментарий успешно добавлен!');
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
