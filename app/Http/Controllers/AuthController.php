<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController
{
    // Отображение страницы регистрации
    public function create()
    {
        return view('auth.signin');
    }

    // Обработка регистрации
    public function registration(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        User::create($validated);

        return redirect()
            ->route('login')
            ->with('success', 'Регистрация прошла успешно! Теперь войдите в аккаунт.');
    }

    // Отображение формы авторизации
    public function loginForm()
    {
        return view('auth.login');
    }

    // Обработка авторизации
    public function login(Request $request)
    {
        // Проверка введённых данных
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Проверка email и пароля
        if (!Auth::attempt($credentials)) {
            return back()
                ->withErrors([
                    'email' => 'Неверный email или пароль.',
                ])
                ->onlyInput('email');
        }

        // Обновление идентификатора сессии
        $request->session()->regenerate();

        // Получение авторизованного пользователя
        $user = Auth::user();

        // Создание токена Sanctum
        $token = $user->createToken('web-session');

        // Сохраняем ID токена в сессии для последующего удаления
        $request->session()->put('sanctum_token_id', $token->accessToken->id);

        // Перенаправление на главную страницу
        return redirect()->route('home');
    }

    // Выход из системы
    public function logout(Request $request)
    {
        $user = Auth::user();

        // Удаление созданного токена Sanctum
        if ($user && $request->session()->has('sanctum_token_id')) {
            $user->tokens()
                ->where('id', $request->session()->get('sanctum_token_id'))
                ->delete();
        }

        // Завершение авторизованной сессии
        Auth::logout();

        // Аннулирование старой сессии
        $request->session()->invalidate();

        // Создание нового CSRF-токена
        $request->session()->regenerateToken();

        return redirect()
            ->route('home');
    }
}
