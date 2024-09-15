<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Journaliser les informations utilisateur
        Log::info('User:', ['user' => Auth::user()]);
        Log::info('Is admin:', ['is_admin' => Auth::check() ? Auth::user()->is_admin : 'Not logged in']);

        // Vérification si l'utilisateur est connecté et admin
        if (!Auth::check() || !Auth::user()->is_admin) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Accès non autorisé.'], 403);
            }

            return redirect()->route('login')->with('error', 'Accès non autorisé. Veuillez vous connecter avec un compte administrateur.');
        }

        return $next($request);
    }
}
