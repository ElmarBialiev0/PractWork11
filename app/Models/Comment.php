<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = [
        'article_id',
        'user_id',
        'content',
    ];

    // Комментарий принадлежит новости
    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }

    // Комментарий принадлежит пользователю
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
