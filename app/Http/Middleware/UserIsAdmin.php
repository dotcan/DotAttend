<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response) $next
     * @return Response|\Illuminate\Auth\Access\Response
     */
    public function handle(Request $request, Closure $next): Response|\Illuminate\Auth\Access\Response
    {
        if (Auth::user()->type == "ADMIN")
            return $next($request);
        return redirect()->route('home');
    }
}
