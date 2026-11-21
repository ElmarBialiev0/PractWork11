<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ArticleController
{
    // Список новостей
    public function index()
    {
        Gate::authorize('viewAny', Article::class);

        $articles = Article::paginate(6);

        return view('articles.index', [
            'articles' => $articles
        ]);
    }

    // Просмотр одной новости

    public function show($id)
    {
        $article = Article::with('comments.user')->findOrFail($id);

        Gate::authorize('view', $article);

        return view('articles.show', [
            'article' => $article
        ]);
    }


    // Форма создания новости
    public function create()
    {
        Gate::authorize('create', Article::class);

        return view('articles.create');
    }

    // Сохранение новой новости
    public function store(Request $request)
    {
        Gate::authorize('create', Article::class);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|string|max:255',
            'description' => 'required|string',
            'author' => 'required|string|max:255',
        ]);

        Article::create($validated);

        return redirect()
            ->route('articles.index')
            ->with('success', 'Новость успешно добавлена!');
    }

    // Форма редактирования
    public function edit($id)
    {
        $article = Article::findOrFail($id);

        Gate::authorize('update', $article);

        return view('articles.edit', [
            'article' => $article
        ]);
    }

    // Обновление новости
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        Gate::authorize('update', $article);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|string|max:255',
            'description' => 'required|string',
            'author' => 'required|string|max:255',
        ]);

        $article->update($validated);

        return redirect()
            ->route('articles.index')
            ->with('success', 'Новость успешно обновлена!');
    }

    // Удаление новости
    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        Gate::authorize('delete', $article);

        $article->delete();

        return redirect()
            ->route('articles.index')
            ->with('success', 'Новость успешно удалена!');
    }
}
