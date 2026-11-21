<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ArticlePolicy
{
    // Просмотр списка новостей
    public function viewAny(User $user): Response
    {
        return $user->role?->name === 'reader'
            ? Response::allow()
            : Response::deny('У вас нет прав для просмотра списка новостей.');
    }

    // Просмотр отдельной новости
    public function view(User $user, Article $article): Response
    {
        return $user->role?->name === 'reader'
            ? Response::allow()
            : Response::deny('У вас нет прав для просмотра этой новости.');
    }

    // Создание новости
    public function create(User $user): Response
    {
        return Response::deny('Создавать новости может только модератор.');
    }

    // Редактирование новости
    public function update(User $user, Article $article): Response
    {
        return Response::deny('Редактировать новости может только модератор.');
    }

    // Удаление новости
    public function delete(User $user, Article $article): Response
    {
        return Response::deny('Удалять новости может только модератор.');
    }
}
