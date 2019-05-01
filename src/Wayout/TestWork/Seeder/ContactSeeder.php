<?php

namespace Distinc\Wayout\TestWork\Seeder;

use Distinc\Wayout\Domain\Entity\Contact;
use Distinc\Wayout\Console\Command\TableSeeder;

class ContactSeeder extends TableSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new Contact([
                'first_name' => $this->fake->first_name,
                'last_name' =>  $this->fake->last_name,
            ])
        )
            ->save();
    }
}
