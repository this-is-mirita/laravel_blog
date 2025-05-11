<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //dd(111111);
        //dd(auth()->user()->role);
        if ( (int) auth()->user()->role !== User::ROLE_ADMIN) {
            abort(404, 'qwertyuiop');
        }
        return $next($request);
    }
}
