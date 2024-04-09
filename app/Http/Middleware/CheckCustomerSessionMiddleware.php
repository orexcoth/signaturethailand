<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCustomerSessionMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the customer session exists
        if (!$request->session()->has('customer')) {
            return redirect()->route('historyloginPage');
        }

        return $next($request);
    }
}
