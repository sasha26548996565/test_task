<?php

declare(strict_types=1);

namespace App\Actions\Comment;

use App\Models\Comment;

class DestroyComment
{
    public function __invoke(Comment $comment): void
    {
        $comment->delete();
    }
}
