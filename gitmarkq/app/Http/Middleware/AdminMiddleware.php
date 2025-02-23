<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() == false){
            return redirect()->route('admin.login');
        }elseif(Auth::user()->is_admin != 1){
            // return response()->view('errors.403');
            return response()->json([
                'message' => 'Unauthorized'
            ]);
        }
        return $next($request);
    }
}
