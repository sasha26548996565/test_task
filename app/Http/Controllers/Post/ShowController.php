<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Inertia\Inertia;
use App\Models\Comment;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        $post->load(['category', 'comments', 'user']);
        $comments = Comment::with('user')->where('post_id', $post->id)->get();

        return Inertia::render('Post/Show', [
            'post' => $post,
            'comments' => $comments
        ]);
    }
}
