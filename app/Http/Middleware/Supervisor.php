<?php

namespace Inventario\Http\Middleware;

use Closure;

class Supervisor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()->access_level == "Supervisor" || $request->user()->access_level == "Superuser") {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return $next($request);
            }
        }
        else
        {
            return redirect()->route('Dashboard')->with('error', "Su perfil de '" . $request->user()->access_level . "' no tiene los permisos necesarios para ingresar a pagina '" . $request->route()->getName() . "'");
        }
    }
}
