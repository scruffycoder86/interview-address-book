<?php

namespace Distinc\Demo\Database\Concern
{
    use Illuminate\Database\Capsule\Manager as Capsule;
    use Illuminate\Support\Traits\CapsuleManagerTrait;

    /**
     * Trait DatabaseSystem
     *
     * A helper class to instantiate our RDBMS which is an
     * instance of MySQL Server. Frankly, any Server type
     * supported by Eloquent ORM may be utalized
     *
     * @package Distinc\Demo\Database\Concern
     */
    trait DatabaseSystem
    {

        /**
         * @var Capsule $capsule
         */
        protected $capsule;

        /**
         * @var bool $isInitialized
         */
        protected $isInitialized = false;

        /**
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
         * Your .env file must be present and loaded onto memory for best results
         *
         * @return array
         */
        private static function options()
        {
            return [

                "driver" => "mysql",

                "host" => env("DB_HOST"),

                "database" => env("DB_DATABASE"),

                "username" => env("DB_USERNAME"),

                "password" => env("DB_PASSWORD")

            ];
        }
    }
}