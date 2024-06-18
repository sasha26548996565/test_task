<?php

declare(strict_types=1);

namespace App\Actions\Comment;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CreateComment
{
    public function __invoke(array $params, int $postId): Comment
    {
        $comment = Comment::create([
            'text' => $params['text'],
            'post_id' => $postId,
            'user_id' => Auth::user()->id
        ]);

        return $comment;
    }
}
