<?php

declare(strict_types=1);

namespace App\Actions\Post;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CreatePost
{
    public function __invoke(array $params): Post
    {
        $params['user_id'] = Auth::user()->id;
        $post = Post::create($params);

        return $post;
    }
}
