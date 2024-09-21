<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;

class ArticlePolicy
{
    /**
     * Create a new policy instance.
     */
    public function modify(User $user, Article $article)
    {
        return $user->id === $article->user_id;
    }
}
