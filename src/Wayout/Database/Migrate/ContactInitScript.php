<?php

namespace Distinc\Wayout\Database\Migrate;

use Illuminate\Database\Schema\Blueprint;
use Distinc\Wayout\Database\Concern\AbstractInitScript;

/**
 * Class ContactInitScript
 *
 * @package Distinc\Wayout\Database\Migrate
 */
class ContactInitScript extends AbstractInitScript
{
    public $name = 'contacts';

    public function execute()
    {
        $this->create('contacts', function(Blueprint $table){

            $table->increments('id');

            $table->string('first_name');

            $table->string('last_name');

            $table->timestamps();
        });
    }
}