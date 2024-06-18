<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Category;
use App\Actions\Post\CreatePost;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Post\CreateRequest;

class CreateController extends Controller
{
    public function renderPage(): Response
    {
        $categories = Category::get();

        return Inertia::render('Post/Create', [
            'categories' => $categories
        ]);
    }

    public function handle(CreateRequest $request, CreatePost $action): RedirectResponse
    {
        $data = $request->validated();
        $post = $action($data);

        return to_route('post.show', [
            'post' => $post
        ]);
    }
}
