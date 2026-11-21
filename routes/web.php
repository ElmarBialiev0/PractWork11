<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
// Главная страница через контроллер
Route::get('/', [MainController::class, 'index'])->name('home');

// Страница "О нас"
Route::get('/about', function () {
    return view('pages.about');
})->name('about');

// Страница "Контакты"
Route::get('/contacts', function () {

    $contacts = [
        [
            'title' => 'ФИО',
            'value' => 'Биалиев Эльмар'
        ],
        [
            'title' => 'Email',
            'value' => 'el.bi06@yandex.ru'
        ],
        [
            'title' => 'Telegram',
            'value' => 't.me/Squid4_04'
        ],
        [
            'title' => 'ВКонтакте',
            'value' => 'vk.com/elmarbialiev'
        ]
    ];

    return view('pages.contacts', [
        'contacts' => $contacts
    ]);

})->name('contacts');

// Страница галереи
Route::get('/galery/{id}', [MainController::class, 'galery'])
    ->name('galery');

// Страница регистрации
Route::get('/signin', [AuthController::class, 'create'])
    ->name('signin.create');

// Обработка регистрации
Route::post('/signin', [AuthController::class, 'registration'])
    ->name('signin.registration');

Route::get('/articles', [ArticleController::class, 'index'])
    ->name('articles.index');
// Новости и CRUD
Route::get('/articles', [ArticleController::class, 'index'])
    ->name('articles.index');

Route::get('/articles/create', [ArticleController::class, 'create'])
    ->name('articles.create');

Route::post('/articles', [ArticleController::class, 'store'])
    ->name('articles.store');

Route::get('/articles/{id}', [ArticleController::class, 'show'])
    ->name('articles.show');

Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])
    ->name('articles.edit');

Route::put('/articles/{id}', [ArticleController::class, 'update'])
    ->name('articles.update');

Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])
    ->name('articles.destroy');