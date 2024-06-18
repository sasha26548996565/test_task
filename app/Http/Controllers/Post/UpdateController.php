<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Category;
use App\Actions\Post\UpdatePost;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Post\UpdateRequest;

class UpdateController extends Controller
{
    public function renderPage(Post $post): Response
    {
        $post->load('category');
        $categories = Category::get();

        return Inertia::render('Post/Update', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function handle(UpdateRequest $request, Post $post, UpdatePost $action): RedirectResponse
    {
        $data = $request->validated();
        $post = $action($data, $post);

        return to_route('post.show', [
            'post' => $post
        ]);
    }
}
