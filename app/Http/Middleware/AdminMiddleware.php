<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            // if (auth()->user()->is_admin == 1) {
            //     return redirect()->route('admin.loginPost');
            // } else {
            //     return redirect()->route('admin.loginPost');
            // }
        }

        // If the user is not authenticated, redirect to the login page
        return redirect()->route('admin.login');
    }
}


