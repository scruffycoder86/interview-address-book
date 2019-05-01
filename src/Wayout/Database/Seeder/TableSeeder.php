<?php

namespace Distinc\Wayout\Console\Command;

use Illuminate\Database\Seeder;

abstract class TableSeeder extends Seeder
{
    protected $fake;

    public function __construct()
    {
        $this->fake = \Faker\Factory::create();
    }

    /**
     * List of seeder classes to execute.
     *
     * @var array
     */
    protected $seeders = [
        \Distinc\Wayout\TestWork\Seeder\ContactSeeder::class,
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->seeders as $seeder) {
            $this->call($seeder);
        }
    }
}