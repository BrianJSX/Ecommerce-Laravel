<?php

namespace App\Http\Middleware;

use Closure;

class checkidadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request,$id, Closure $next)
    {
        
            $result = DB::table('tbl_brand')->where('id',$id)->count();
            
            if($result>1){
                    return view('404');
            }else{
                return $next($request);
            }
        
    }
}
