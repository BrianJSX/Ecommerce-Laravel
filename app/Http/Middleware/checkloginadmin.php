<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class checkloginadmin
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
        $admin_id = Session::has('admin_id');
        $staff_id = Session::has('staff_id');

        if ($admin_id) {
           return redirect()->route('dashboard');
        } elseif ($staff_id){
            return Redirect::to('staff/dashboard');
        }
            return $next($request);

    }
}
