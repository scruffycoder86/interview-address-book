<?php

require_once __DIR__ . '/../vendor/autoload.php';

\Dotenv\Dotenv::create(__DIR__ . '/../', '.env')
    ->load();