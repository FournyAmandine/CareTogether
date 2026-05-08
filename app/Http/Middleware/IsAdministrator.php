<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isAdministrator
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->role !== UserRole::Administrator) {
            return response()->view('errors.not_authorized', [], 403);
        }
        return $next($request);
    }
}
