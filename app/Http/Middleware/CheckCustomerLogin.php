<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCustomerLogin
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // If customer is logged in and trying to access guest routes (login/register)
        if (auth()->guard('customer')->check()) {
            return redirect()->route('home')->with('message', 'You are already logged in!');
        }

        return $next($request);
    }
}