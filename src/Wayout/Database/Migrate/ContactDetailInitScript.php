<?php

namespace Distinc\Wayout\Database\Migrate;

use Illuminate\Database\Schema\Blueprint;
use Distinc\Wayout\Database\Concern\AbstractInitScript;

class ContactDetailInitScript extends AbstractInitScript
{
    protected $name = 'contact_details';

    public function execute()
    {
        $this->create('contact_details', function(Blueprint $table){

            $table->increments('id');

            $table->json('value')->nullable(false);

            $table->integer('contact_id');

            $table->timestamps();
        });
    }
}