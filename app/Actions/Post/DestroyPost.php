<?php

declare(strict_types=1);

namespace App\Actions\Post;

use App\Models\Post;

class DestroyPost
{
    public function __invoke(Post $post): void
    {
        $post->delete();
    }
}
