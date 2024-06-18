<?php

declare(strict_types=1);

namespace App\Actions\Post;

use App\Models\Post;

class UpdatePost
{
    public function __invoke(array $params, Post $post): Post
    {
        $post->update($params);

        return $post;
    }
}
