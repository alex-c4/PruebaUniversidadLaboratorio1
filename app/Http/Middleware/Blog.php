<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Blog
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
        if(Auth::check()) {
            $rollId = auth()->user()->rollId;
            if($rollId != 4 && $rollId != 1){
                return redirect('/dashboard');
            }
            return $next($request);
        }else{
            return redirect('/register');            
        }
    }
}
