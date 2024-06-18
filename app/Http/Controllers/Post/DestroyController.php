<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Actions\Post\DestroyPost;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class DestroyController extends Controller
{
    public function __invoke(Post $post, DestroyPost $action): RedirectResponse
    {
        $action($post);

        return to_route('home');
    }
}
