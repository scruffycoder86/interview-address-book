<?php

namespace Distinc\Wayout\Middleware\Http;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CorsMiddleware
{
    public function handle(Request $request, \Closure $next)
    {
        header('Access-Control-Allow-Origin: *');

        $headers = [
            'Access-Control-Allow-Methods' => 'POST,GET,PUT,DELETE,OPTIONS',
            'Access-Control-Allow-Headers' => 'Content-Type, Origin'
        ];

        if($request->getMethod() == "OPTIONS"){
            return Response::create('Ok', 200, $headers);
        }

        $response = $next($request);

        foreach($headers as $key => $val){
            $response->header($key, $val);
        }

        return $response;
    }
}