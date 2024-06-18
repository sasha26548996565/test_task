<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use App\Enums\RoleList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EditCommentMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $comment = $request->comment;
        $comment->load('user');

        if (($user->role->name == RoleList::EDITOR->value) || ($comment->user->id == $user->id)) {
            return $next($request);
        }

        return to_route('home');
    }
}
