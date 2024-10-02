<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLogin
{
    public function handle(Request $request, Closure $next): Response
    {
        $token = session('token');
        if (!$token)
            return redirect()->route('login');

        $user = json_decode(session('user'), true);


        if ($user['role_id'] == 4)
            return redirect()->route('logout');
        return $next($request);
    }
}
