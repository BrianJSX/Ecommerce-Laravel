<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Auth;
use Illuminate\Support\Facades\Redirect;

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
        $staff = Session::has('staff_id');
        if($admin){
            return $next($request);
        } elseif ($staff){
            return Redirect::to('staff/dashboard');
        }
            return redirect()->route('admin');
    }
}
