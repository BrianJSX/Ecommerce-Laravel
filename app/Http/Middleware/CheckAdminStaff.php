<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;
use Session;
class CheckAdminStaff
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
        $admin_id =  Session::get('admin_id');
        if($admin_id){
            return Redirect::to('admin');
        }
        return $next($request);
    }
}
