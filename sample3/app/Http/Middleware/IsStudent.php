<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;


class IsStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next){

        if(Session::has('userrole') && Session::get('userrole')!='Student'){
            return redirect()->to('/teacher')->with('msg', 'You are not authorized');
        }
            return $next($request);
        }
}
