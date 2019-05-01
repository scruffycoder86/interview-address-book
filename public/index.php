<?php

use Illuminate\Events\Dispatcher;
use Illuminate\Http\Request;
use Illuminate\Routing\Pipeline;
use Illuminate\Routing\Router;

require_once __DIR__ . '/../bootstrap/app.php';

/** Http Service Layer stack */
$events = new Dispatcher($app);
$router = new Router($events, $app);

/** Http Middleware section */
$globalMiddleware = [
];

$routeMiddleware = [
    'cors' => \Distinc\Wayout\Middleware\Http\CorsMiddleware::class,
];

foreach ($routeMiddleware as $key => $middleware) {
    $router->aliasMiddleware($key, $middleware);
}

/** Api Routes our Vue App interfaces with */
require_once __DIR__ . '/../routes/web.php';

/** Bind the captured Request onto the Api */
$request = \Illuminate\Http\Request::capture();
$app->instance(Request::class, $request);

/** Handle Client Request and pass back the Response */
$response = (new Pipeline($app))
    ->send($request)
    ->through($globalMiddleware)
    ->then(function ($request) use ($router) {
        return $router->dispatch($request);
    });
$response->send();