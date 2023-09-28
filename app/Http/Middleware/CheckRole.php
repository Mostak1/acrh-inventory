<?php

namespace App\Http\Middleware;

use App\Models\UserRole;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();
        $roleIds = UserRole::where('user_id', $user->id)->pluck('role_id');
        foreach ($roleIds as $role) {
            if ($user->hasRole($role)) {
                return $next($request);
            }
        }
        if ($user && $user->role == $role) {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
