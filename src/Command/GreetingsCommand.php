<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GreetingsCommand extends Command
{
  // the name of the command (the part after "bin/console")
  protected static $defaultName = 'app:greetings';

  protected function configure()
  {
    $this
      // the short description shown while running "php bin/console list"
      ->setDescription('Says "Hello" to Thomas.')

      // the full command description shown when running the command with
      // the "--help" option
      ->setHelp('This command greets everyone named Thomas.')
  ;
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
    $output->writeln('Hello Thomas');
  }
}
