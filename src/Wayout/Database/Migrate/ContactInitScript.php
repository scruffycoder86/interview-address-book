<?php

namespace Distinc\Demo\Tools\Console\Migrate\Database
{
    use Symfony\Component\Console\Command\Command;
    use Symfony\Component\Console\Helper\ProgressBar;
    use Distinc\Demo\Database\Concern\ConnectionConcern;
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
    class ContactInitScript extends Command
    {
        use ConnectionConcern;

        protected function configure()
        {
            $this->setName('table:create:contacts')
                ->setDescription('Create an instance of our AddressBook System\'s initial Database tables called `contacts`')
                ->setHelp('This command creates initial database table instance');

            if(!$this->isInitialized){

                $this->init();
            }
        }

        protected function execute(InputInterface $input, OutputInterface $output)
        {
            $progress = new ProgressBar($output);
            $progress->start();

            $i = 0;

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

                while ($i++ < 100) {
                    usleep(300000);
                    $progress->advance();
                }

                $output->write("\n");
                $output->write("\nBANNER NOTE: Table `contacts` has been created.\n");
                $output->write("\n");
            }else{
                $output->writeln("PLEASE NOTE: Table `contacts` has already been created.");
            }
        }
    }
}