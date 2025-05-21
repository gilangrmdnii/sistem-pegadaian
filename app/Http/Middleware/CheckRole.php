<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->load('role');
        $roles = explode('|', $roles[0]);


        // Jika role tidak ada atau tidak sesuai
        if (!$user->role || !in_array($user->role->name, $roles)) {
            abort(403, 'Unauthorized access. Role: ' . optional($user->role)->name);
        }

        return $next($request);
    }
}
