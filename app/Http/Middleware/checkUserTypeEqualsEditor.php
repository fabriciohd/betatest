<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkUserTypeEqualsEditor
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
        if (!auth()->guard('api')->check()) {
            return redirect()->route('login');
        }
        $typeUser = auth()->guard('api')->user()->user_type;
        if (!($typeUser == 'editor' || $typeUser == 'adm')) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
