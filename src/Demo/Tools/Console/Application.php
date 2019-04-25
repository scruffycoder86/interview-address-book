<?php

namespace Distinc\Demo\Tools\Console
{
    use Distinc\Demo\Database\Concern\DatabaseSystem;
    use Symfony\Component\Console\Application as BaseApplication;

    class Application extends BaseApplication
    {
        use DatabaseSystem;

        public function __construct()
        {
            parent::__construct('Distinc Demo for Realm Digital');
        }

        public function isRunningInConsole()
        {
            return true;
        }
    }
}