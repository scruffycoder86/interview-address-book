<?php

namespace Distinc\Wayout\Database\Migrations
{
    use Illuminate\Support\Facades\Schema;

    use Distinc\Wayout\Concern\ConnectionConcern;

    class ContactDetailInitScript
    {
        use ConnectionConcern;

        protected $name = 'contact_detail';

        protected function configure()
        {
            if(!$this->isInitialized){

                $this->init();
            }
        }

        protected function execute()
        {
            Schema::create('contact_details', function($table){

                $table->increments('id');

                $table->json('value')->nullable(false);

                $table->integer('contact_id');

                $table->timestamps();

            });
        }

        public function getName()
        {
            return $this->name;
        }
    }
}