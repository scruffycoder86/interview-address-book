<?php

namespace Distinc\Demo\Tools\Console\Migrate\Database
{
    use Symfony\Component\Console\Command\Command;
    use Distinc\Demo\Database\Concern\DatabaseSystem;
    use Symfony\Component\Console\Input\InputInterface;
    use Symfony\Component\Console\Output\OutputInterface;

    /**
     * Class MigrateTablesCommand
     *
     * This command leaves room for detail and expansion with its
     * concern and contract in terms of true representation of the idea
     *
     * @package Distinc\Demo\Tools\Console\Migrate\Database
     */
    class CreateContactDetailTableCommand extends Command
    {
        use DatabaseSystem;

        protected function configure()
        {
            $this->setName('table:create:contact_details')
                ->setDescription('Create an instance of our AddressBook System\'s initial Database tables called `contact_details`')
                ->setHelp('This command creates initial database table instance');

            if(!$this->isInitialized){

                $this->init();
            }
        }

        protected function execute(InputInterface $input, OutputInterface $output)
        {
            $schemaBuilder = $this->getCapsule()
                ->getDatabaseManager()
                ->getSchemaBuilder();

            if(! $schemaBuilder->hasTable('contact_details')){

                $schemaBuilder->create('contact_details', function($table){

                    $table->increments('id');

                    $table->string('mobile')->nullable(true);

                    $table->string('email')->nullable(true);

                    $table->integer('contact_id');

                    $table->timestamps();

                });
            }else{
                $output->writeln("PLEASE NOTE: Table `contact_details` has already been created.");
            }
        }
    }
}