<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Article;
use App\Policies\ArticlePolicy;
use App\Models\Comment;
use App\Policies\CommentPolicy;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Gate::policy(Comment::class, CommentPolicy::class);
        Gate::policy(Article::class, ArticlePolicy::class);
        Gate::before (function (User $user, string $ability) {
            if ($user->role && $user->role->name === 'moderator') {
                return true;
            }

            return null;
        });
    }
}
