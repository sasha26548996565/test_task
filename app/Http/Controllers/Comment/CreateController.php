<?php

declare(strict_types=1);

namespace App\Http\Controllers\Comment;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Actions\Comment\CreateComment;
use App\Http\Requests\Comment\CreateRequest;

class CreateController extends Controller
{
    public function __invoke(CreateRequest $request, Post $post, CreateComment $action): RedirectResponse
    {
        $data = $request->validated();
        $action($data, $post->id);

        return to_route('post.show', [
            'post' => $post
        ]);
    }
}
