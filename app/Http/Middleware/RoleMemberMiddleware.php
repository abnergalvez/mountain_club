<?php

namespace App\Http\Middleware;

use Closure;

class RoleMemberMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if ( \Auth::user()->isMember() == false )
      {
        return back();
      }
      return $next($request);
    }
}
