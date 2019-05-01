<?php

namespace Distinc\Wayout\Concern
{
    use Illuminate\Database\Capsule\Manager as Capsule;

    /**
     * Trait ConnectionConcern
     *
     * @package Distinc\Demo\Database\Concern
     */
    trait ConnectionConcern
    {

        /**
         * @var Capsule $capsule
         */
        protected $capsule = null;

        /**
         * @var string $driver
         */
        protected $driver = 'mysql';

        /**
         * @var bool $isInitialized
         */
        protected $isInitialized = false;

        /**
         * Initializes Illuminate's Capsule
         *
         * @return void
         */
        public function init()
        {
            $capsule = new Capsule;

            $capsule->addConnection(static::options());

            $capsule->setAsGlobal();

            $capsule->bootEloquent();

            $this->capsule = $capsule;
        }

        /**
         * @return Capsule
         */
        public function getCapsule()
        {
            return $this->capsule;
        }

        /**
         * Load Database Connection parameters from environment variables
         *
         * @return array
         */
        private static function options()
        {
            return [

                "driver" => env("DB_CONNECTION", "mysql"),

                "host" => env("DB_HOST", "localhost"),

                "database" => env("DB_DATABASE", "test"),

                "username" => env("DB_USERNAME", "root"),

                "password" => env("DB_PASSWORD", "")

            ];
        }
    }
}