<?php

declare(strict_types=1);

namespace App\Actions\Comment;

use App\Models\Comment;

class UpdateComment
{
    public function __invoke(array $params, Comment $comment): Comment
    {
        $comment->update($params);

        return $comment;
    }
}
