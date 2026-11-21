<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController
{
    // Список новостей
    public function index()
    {
        $articles = Article::paginate(6);

        return view('articles.index', [
            'articles' => $articles
        ]);
    }

    // Просмотр одной новости
    public function show($id)
    {
        $article = Article::findOrFail($id);

        return view('articles.show', [
            'article' => $article
        ]);
    }

    // Форма создания новости
    public function create()
    {
        return view('articles.create');
    }

    // Сохранение новой новости
    public function store(Request $request)
    {
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

        return view('articles.edit', [
            'article' => $article
        ]);
    }

    // Обновление новости
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

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
        $article->delete();

        return redirect()
            ->route('articles.index')
            ->with('success', 'Новость успешно удалена!');
    }
}
