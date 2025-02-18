<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckProfile
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
        //ログインしていない場合そのまま
        if (!Auth::check()) {
            return $next($request);
        }

        $user = Auth::user();
        //プロフィール未入力なら設定へ
        if (empty($user->postcode) || empty($user->address)) {
            return redirect()->route('profile.edit');
        }
        
        return $next($request);
    }
}
