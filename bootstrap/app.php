<?php

require_once __DIR__ . '/../vendor/autoload.php';

$app = \Illuminate\Container\Container::getInstance();
\Illuminate\Support\Facades\Facade::setFacadeApplication($app);

$app['app'] = $app;
$app['env'] = 'testing';
