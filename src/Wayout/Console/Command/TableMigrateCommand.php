<?php

namespace Distinc\Wayout\Console\Command;

use Distinc\Wayout\Database\Migrate\ContactInitScript;
use Distinc\Wayout\Database\Concern\AbstractInitScript;
use Distinc\Wayout\Database\Migrate\ContactDetailInitScript;

/**
 * Class TableMigrateCommand
 *
 * @package Distinc\Wayout\Console\Command
 */
class TableMigrateCommand extends \Illuminate\Console\Command
{
    /**
     * @var string $targetMethod
     */
    protected $targetMethod = 'execute';

    /** [@inheritdoc] */
    protected $signature = 'db:tables:migrate';

    /** [@inheritdoc] */
    protected $description = 'Initializes this AddressBook Database System\'s tables.';

    /**
     * Handles this command action
     */
    public function handle()
    {
        $this->info('[ An experimental implementation for Realm Digital ]');

        $this->line("\n");

        foreach ($this->scriptObjects() as $tableSchema)
        {
            if(!$tableSchema instanceof AbstractInitScript){

                $this->error("Unrecognized script execution command.");
                throw new \Exception("Unrecognized script execution command.");
            }

            $this->alert("About to create table " . $tableSchema->getName());

            if(!$this->confirm("Are you sure you want to create this and subsequent tables?", true)){

                $this->comment("\nProcess terminating...");

                break;
            }

            if($tableSchema->execute()){
                $this->info("Table has been created successfully");
            }
        }
    }

    /**
     * Initial migration file list
     *
     * @return array
     */
    private function scriptObjects()
    {
        return [
            new ContactInitScript(),
            new ContactDetailInitScript(),
        ];
    }
}
