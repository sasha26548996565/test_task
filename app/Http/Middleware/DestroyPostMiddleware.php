<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class DestroyPostMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $post = $request->post;
        $post->load('user');

        if ($post->user->id == $user->id) {
            return $next($request);
        }

        return to_route('home');
    }
}
