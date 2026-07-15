<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!in_array($request->user()->role, ['admin', 'panitia', 'bendahara', 'kepala_sekolah', 'super_admin'])) {
            abort(403);
        }

        return $next($request);
    }
}
