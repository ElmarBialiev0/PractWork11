<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CommentPolicy
{
    // Читатель и модератор могут добавлять комментарии
    public function create(User $user): Response
    {
        return $user->role?->name === 'reader'
            ? Response::allow()
            : Response::deny('Вы не можете добавлять комментарии.');
    }

    // Редактировать комментарии может только модератор
    public function update(User $user, Comment $comment): Response
    {
        return Response::deny('Редактировать комментарии может только модератор.');
    }

    // Удалять комментарии может только модератор
    public function delete(User $user, Comment $comment): Response
    {
        return Response::deny('Удалять комментарии может только модератор.');
    }
}
