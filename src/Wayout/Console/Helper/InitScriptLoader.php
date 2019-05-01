<?php

namespace Distinc\Wayout\Console\Helper;

use Illuminate\Console\Application;
use Distinc\Wayout\Console\Command\TableMigrateCommand;

class InitScriptLoader
{
    public function onApplication(Application $app)
    {
        try {

            foreach ([ TableMigrateCommand::class ] as $commandClass) {
                $app->resolve($commandClass);
            }

        } catch (\Exception $e) {
        }
    }
}