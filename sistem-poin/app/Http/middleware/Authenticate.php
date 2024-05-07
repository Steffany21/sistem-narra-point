<?php
 
namespace App\Http\Middleware;
 
use Illuminate\Auth\Middleware\Authenticate as Middlewar;
 
class Authenticate extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    protected function redirectTo($request)
    {
        if (!$request->expectJson()) {
            return route('login');
        }
 
        return $next($request);
    }
}