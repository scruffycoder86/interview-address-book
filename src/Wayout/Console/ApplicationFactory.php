<?php

namespace Distinc\Wayout\Console;

use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Illuminate\Console\Application;

/**
 * Class ApplicationFactory
 *
 * This ApplicationFactory class can be further decomposed into
 * varying Decorator and Configuration Strategies
 *
 * @package Distinc\Wayout\Console
 */
class ApplicationFactory
{
    /**
     * @var string $owner
     */
    protected $owner = 'Siko Luyanda';

    /**
     *
     */
    const VERSION = 'Version 1(Demo)';

    /**
     * @var $app
     */
    private $app;

    /**
     * ApplicationFactory constructor.
     *
     * @param Dispatcher|null $dispatcher
     * @param Container|null $container
     * @param array $invokables
     *
     * @throws \Exception
     */
    public function __construct(Dispatcher $dispatcher = null, Container $container = null, array $invokables = [])
    {
        if(!is_null($dispatcher)
            && !is_null($container)
            && !empty($invokables)
        ){
            $this->app = $this->decorateApp(
                $this->initApp(
                    $dispatcher,
                    $container,
                    self::VERSION . " by [{$this->owner}]"
                ), $invokables);
        }
    }

    /**
     * A typical Factory Design Pattern being illumined here for future updates
     *
     * @return Application|null
     *
     * @throws \Exception
     */
    public static function createFromDefaults()
    {
        $container = new Container();

        $factory = new static();

        try {

            return $factory->decorateApp(
                $factory->initApp(
                    new Dispatcher($container),
                    $container,
                    'Version 0.0.0' . " by [{$factory->owner}]"
                ), []);

        } catch (\Exception $e) {
            /** Figure out what to do with these kinds of exceptions */
        }

        return null;
    }

    /**
     * @param Application $app
     * @param array $invokables
     *
     * @return Application
     * @throws \Exception
     */
    protected function decorateApp(Application $app, array $invokables = [])
    {
        $app->setName('Distinct Console Beta');
        foreach($invokables as $commandClass){

            if(!class_exists($commandClass)){
                throw new \Exception(
                    "Invokable {$commandClass} must be an instance of either Laravel/Symfony Console Command type."
                );
            }

            $app->resolve($commandClass);
        }

        (new \Distinc\Wayout\Console\Helper\InitScriptLoader)->onApplication($app);

        return $app;
    }

    /**
     * @param $dispatcher
     * @param $container
     * @param $version
     *
     * @return Application
     */
    private function initApp($dispatcher, $container, $version)
    {
        return new Application($container,$dispatcher, $version);
    }
}