<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
// use Illuminate\Support\Facades\Log;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $permission): Response
    {
        $user = $request->user();
        if (!$user) {
            abort(Response::HTTP_UNAUTHORIZED, 'User not authenticated.');
        }
       
        // Debugging: Log the user's permissions
        // Log::info('User Permissions:', $user->getAllPermissions()->pluck('code')->toArray());

        if (!$user->hasPermission($permission)) {
            abort(Response::HTTP_FORBIDDEN, 'Unauthorized action.');
        }

        return $next($request);

    }
}
