<?php

namespace Distinc\Demo\Tools\Console
{

    use Symfony\Component\Console\Application as BaseApplication;

    class Application extends BaseApplication
    {
        /**
         * Application constructor.
         *
         * @throws \Exception
         */
        public function __construct()
        {
            parent::__construct('Distinc Demo for Realm Digital');


        }
    }
}