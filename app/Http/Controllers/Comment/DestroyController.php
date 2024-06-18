<?php

declare(strict_types=1);

namespace App\Http\Controllers\Comment;

use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Actions\Comment\DestroyComment;

class DestroyController extends Controller
{
    public function __invoke(Comment $comment, DestroyComment $action): RedirectResponse
    {
        $action($comment);

        return back();
    }
}
