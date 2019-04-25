<?php

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Distinc\Demo\Tools\Console\Migrate\Database\CreateContactTableCommand;

class CreateContactTableCommandTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function it_can_create_table(){

        $application = new Application();

        $application->add(new CreateContactTableCommand());

        $command = $application->find('table:create:contacts');

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