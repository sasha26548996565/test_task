<?php

declare(strict_types=1);

namespace App\Http\Controllers\Comment;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Actions\Comment\UpdateComment;
use App\Http\Requests\Comment\UpdateRequest;

class UpdateController extends Controller
{
    public function renderPage(Comment $comment): Response
    {
        return Inertia::render('Comment/Update', [
            'comment' => $comment
        ]);
    }

    public function handle(UpdateRequest $request, Comment $comment, UpdateComment $action): RedirectResponse
    {
        $data = $request->validated();
        $action($data, $comment);

        return to_route('post.show', [
            'post' => $comment->post
        ]);
    }
}
