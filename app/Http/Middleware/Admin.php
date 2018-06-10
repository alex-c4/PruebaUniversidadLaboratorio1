<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        $rollId = auth()->user()->rollId;
        if($rollId != 1){
            return redirect('/dashboard');
        }
        
        return $next($request);

    }
}
