<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Protection;

class PageProtectionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $request->route('id')
        // $request->get("")
       $page = Protection::where("protected_id", $request->route('id'))->first();
       if($page == null){
        return $next($request);
       }else{
        return redirect()->back()->with('error_message','This Page is Protected, Cannot be deleted, Please remove protection');
       }
    }
}
