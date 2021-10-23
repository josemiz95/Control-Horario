<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthCookie
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $bearer = (isset($_COOKIE['bearerToken']))?explode('|',$_COOKIE['bearerToken']):[];
        $bearer = (count($bearer)==2)?$bearer[1]:'';

        if ($token = DB::table('personal_access_tokens')->where('token',hash('sha256',$bearer))->first())
        {
            if ($user = User::find($token->tokenable_id))
            {
                Auth::login($user);
                return $next($request);
            }
        }

        Auth::logout();
        return route('login');
    }
}
