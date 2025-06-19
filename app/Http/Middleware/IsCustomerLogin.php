<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsCustomerLogin
{
    /*
* @param \Closure(\Illuminate\Http\Request):
(\Symfony\Component\HttpFoundation\Response) $next
*/
    public function handle(Request $request, Closure $next): Response
    {
        // Periksa apakah ada customer yang sudah login (misalnya, session aktif)
        if (auth()->guard('customer')->check()) {
            return $next($request);
        }
        return redirect()->route('customer.login');
    }
}
