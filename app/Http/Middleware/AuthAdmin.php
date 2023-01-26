<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    /**
     * Este middleware está diseñado para comprobar si el usuario está
     * correctamente logeado en la plataforma. 
     * Obtenemos la session 'is_valid'.
     * Comprobamos que su valor sea diferente a 'true'.
     * Si es el caso, redireccionamos a la vista de login. 
     * Si es el caso contrario, seguimos con nuestra petición principal. 
     */
    public function handle(Request $request, Closure $next)
    {
        $is_valid = $request->session()->get('is_valid');
        
        if (!$is_valid) {
            return to_route('login.index'); 
        };

        return $next($request);
    }
}
