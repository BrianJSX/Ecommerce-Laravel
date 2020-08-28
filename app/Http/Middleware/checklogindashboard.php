<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Auth;
class checklogindashboard
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
        $admin = Session::has('admin_id');
        if($admin){
            return $next($request);
        }else{
            return redirect()->route('admin');
        }
    }
}
