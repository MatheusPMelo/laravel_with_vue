<?php

namespace App\Http\Middleware;

use Closure;
use App\LogAcesso;

class LogAcessoMiddleware
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

        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request -> getRequestUri();

        //dd($request);

        LogAcesso::create([
            'log' => "IP: $ip Requisitou a rota $rota"
        ]);

        $resposta = $next($request);

        $resposta -> setStatusCode(201, 'não tem ovos de páscoa aqui');

        //dd($resposta);

        return $next($request);

    }
}