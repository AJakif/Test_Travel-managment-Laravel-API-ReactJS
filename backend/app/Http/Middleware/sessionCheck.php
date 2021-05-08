<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class sessionCheck
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
       /*  if($request->session()->has('username')){

          $request->session()->flash('msg','Invalid request');
          return $next($request);
        }
    else{
        return redirect('/login');
    } */

    
    if($request->session()->has('username') && !session()->has('LoggedUser') && ($request->path() !='/login' && $request->path() !='/register' )){
        return redirect('/login')->with('fail','You must be logged in');
    }

    if( $request->session()->has('username') && session()->has('LoggedUser') && ($request->path() == '/login' || $request->path() == '/register' ) ){
       
        return back();
    }
    return $next($request);

    }
}
