<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Events\Dispatcher;

require_once __DIR__ . '/../bootstrap/app.php';

$request = \Illuminate\Http\Request::capture();

$app->instance(Request::class, $request);

$events = new Dispatcher($app);

$router = new Router($events, $app);

require_once __DIR__ . '/../routes/web.php';

$response = $router->dispatch($request);

$response->send();