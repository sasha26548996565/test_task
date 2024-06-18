<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Category;
use App\Http\Filters\PostFilter;
use Illuminate\Support\Collection;
use App\Http\Requests\FilterRequest;

class HomeController extends Controller
{
    public function __invoke(FilterRequest $request): Response
    {
        $data = $request->validated();

        $posts = Post::with('category')->get();
        $categories = Category::get();

        if (empty($data) == false) {
            $posts = $this->filterPosts($data);
        }

        return Inertia::render('Home', [
            'posts' => $posts,
            'categories' => $categories
        ]);
    }

    private function filterPosts(array $data): Collection
    {
        $filter = app()->make(PostFilter::class, ['queryParams' =>
            array_filter([
                'category_id' => $data['category_id'],
                'user_id' => $data['user_id'],
            ])
        ]);

        $posts = Post::with('category')->filter($filter)->get();

        return $posts;
    }
}
