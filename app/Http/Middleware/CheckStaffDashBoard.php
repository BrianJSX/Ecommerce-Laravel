<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;
use Session;
class CheckStaffDashBoard
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
        $staffId = Session::get('staff_id');
        $adminId = Session::get('admin_id');

        if (!$staffId) {
            return Redirect::to('staff');
        } elseif ($adminId) {
            return Redirect::to('admin/dashboard');
        }
        return $next($request);
    }
}
