<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

//調用auth
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    //$is_admin是
    public function handle(Request $request, Closure $next, $guard = null)
    {
        //如果有登入----  Auth::guard($guard)->check()   我也不知道為蛇這樣寫  本來不應該是這樣寫嗎？Auth::check()   網路上也查不到答案,以後在慢慢查

        //而且is_admin欄位值等於1的話 ----  Auth::user()->is_admin == 1
        if(Auth::guard($guard)->check() && Auth::user()->is_admin == 1){

            return $next($request);
            //做後續的事情

        }else{

            return redirect('/');
            //否則導入到首頁

        }

    }
}
