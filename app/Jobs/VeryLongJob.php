<?php

namespace App\Jobs;

use App\Mail\ArticleCreated;
use App\Models\Article;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class VeryLongJob implements ShouldQueue
{
    use Queueable;

    public Article $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function handle(): void
    {
        $moderator = User::whereHas('role', function ($query) {
            $query->where('name', 'moderator');
        })->first();

        if ($moderator) {
            Mail::to($moderator->email)
                ->send(new ArticleCreated($this->article));
        }
    }
}
