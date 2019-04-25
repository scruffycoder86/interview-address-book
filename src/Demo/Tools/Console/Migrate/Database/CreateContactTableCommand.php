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
    class CreateContactTableCommand extends Command
    {
        use DatabaseSystem;

        protected function configure()
        {
            $this->setName('table:create:contact')
                ->setDescription('Create an instance of our AddressBook System\'s initial Database tables called `contacts`')
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

            if(! $schemaBuilder->hasTable('contacts')){

                $schemaBuilder->create('contacts', function($table){

                    $table->increments('id');

                    $table->string('first_name');

                    $table->string('last_name');

                    $table->timestamps();

                });

                $output->writeln("BANNER NOTE: Table `contacts` has been created.");
            }else{
                $output->writeln("PLEASE NOTE: Table `contacts` has already been created.");
            }
        }
    }
}