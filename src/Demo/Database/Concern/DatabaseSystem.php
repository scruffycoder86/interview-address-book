<?php

namespace Distinc\Demo\Database\Concern
{
    use Illuminate\Database\Capsule\Manager as Capsule;

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
         * @var $capsule
         */
        protected $capsule;

        /**
         * @return void
         */
        public function init()
        {
            $capsule = new Capsule;

            $capsule->addConnection(static::options());

            /**
             * We only want to set our Capsule instance as
             * global at Application Level
             */
            if(!$this->isRunningInConsole()){

                $capsule->setAsGlobal();
            }
        }

        /**
         * Your .env file must be present and loaded onto the memory
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