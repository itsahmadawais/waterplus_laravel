<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next , $role)
    {
        $user = Auth::user();
        $roles = explode(
            '|',
            $role
        );
        if(!is_array($roles))
        {
            if($user->role==$roles)
            {
                return $next($request);
            }
        }
        else{
            if(in_array($user->role,$roles))
            {
                return $next($request);
            }
        }
        if($user->role=="customer")
        {
            return redirect('customers/'.auth()->user()->id);
        }
        abort(403);
    }
}
