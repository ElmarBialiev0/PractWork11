<?php

namespace App\Http\Controllers;

class MainController
{
    public function index()
    {
        $articles = json_decode(
            file_get_contents(public_path('articles.json')),
            true
        );

        return view('pages.home', [
            'articles' => $articles
        ]);
    }

    public function galery($id)
    {
        $articles = json_decode(
            file_get_contents(public_path('articles.json')),
            true
        );

        if (!isset($articles[$id])) {
            abort(404);
        }

        return view('pages.galery', [
            'article' => $articles[$id]
        ]);
    }
}