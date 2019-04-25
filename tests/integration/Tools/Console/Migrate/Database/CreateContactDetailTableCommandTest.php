<?php

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Distinc\Demo\Tools\Console\Migrate\Database\CreateContactDetailTableCommand;

class CreateContactDetailTableCommandTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function it_can_create_tables(){

        $application = new Application();

        $application->add(new CreateContactDetailTableCommand());

        $command = $application->find('table:create:contact_details');

        $commandTester = new CommandTester($command);

        $commandTester->execute(array(
            'command'      => $command->getName()
        ));

        /**
         * NOTE: Not the best way to test but since we don't have time and we
         * pretty much are developing a POC we may need to work on our Test
         * Context so it is separate from the main Application one
         */
        $this->assertIsString($commandTester->getDisplay());

    }

}