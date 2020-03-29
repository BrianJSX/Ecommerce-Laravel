<?php

namespace App\Http\Middleware;


use Closure;
use Cart;
use Illuminate\Support\Facades\Redirect;
class CheckCart
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
        $data = Cart::isEmpty();
        if($data==true){
            return redirect()->route('home');
        }else{
            return $next($request);
        }
        
    }
}
