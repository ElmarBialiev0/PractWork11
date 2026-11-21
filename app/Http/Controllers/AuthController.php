<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Регистрация прошла успешно!',
            'data' => [
                'name' => $validated['name'],
                'email' => $validated['email'],
            ]
        ]);
    }
}
