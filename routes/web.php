
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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
