<?php

namespace Distinc\Demo\Tools\Console\Command
{
    use Symfony\Component\Console\Command\Command;
    use Symfony\Component\Console\Input\InputInterface;
    use Symfony\Component\Console\Output\OutputInterface;

    class MigrateTablesCommand extends Command
    {
        protected function configure()
        {
            $this->setName('tables:migrate')
                ->setDescription('Creates our AddressBook System\'s initial Database tables')
                ->setHelp('This command creates initial database tables');
        }

        protected function execute(InputInterface $input, OutputInterface $output)
        {

        }
    }
}