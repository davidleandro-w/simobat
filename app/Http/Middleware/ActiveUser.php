<?php

namespace App\Http\Middleware;

use App\Http\Controllers\LogoutController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ActiveUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->is_active) {
            return $next($request);
        } else {
            auth()->logout();
            return redirect()->route('login')->with('error', 'Akun anda tidak aktif, silahkan hubungi admin!');
        }
    }
}
