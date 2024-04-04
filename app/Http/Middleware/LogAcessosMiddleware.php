<?php

namespace App\Http\Middleware;
use App\Models\LogAcessosModel;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogAcessosMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->server->get('REMOTE_ADDR');
        $web = $request->getRequestUri();

        LogAcessosModel::create(['log' => "$id - rota - $web"]);

        return $next($request);
        
    }
}
