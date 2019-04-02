<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;


class MessageCommand extends Command
{
  // the name of the command (the part after "bin/console")
  protected static $defaultName = 'app:message';

  protected function configure()
  {
    $this

      ->addArgument('text', InputArgument::REQUIRED, 'The message content.')
      // the short description shown while running "php bin/console list"
      ->setDescription('Send messages to the "test-symfony" slack channel')

      // the full command description shown when running the command with
      // the "--help" option
      ->setHelp('Write your message after this command')
      ;
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
    // Create a constant to store your Slack URL
    define('SLACK_WEBHOOK', 'https://hooks.slack.com/services/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');
    // Make your message
    $message = array('payload' => json_encode(array('text' => $input->getArgument('text'))));
    // Use curl to send your message
    $c = curl_init(SLACK_WEBHOOK);
    curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($c, CURLOPT_POST, true);
    curl_setopt($c, CURLOPT_POSTFIELDS, $message);
    curl_exec($c);
    curl_close($c);

    $output->write('You sent : ');
    $output->writeln($input->getArgument('text'));
    $output->write('To the test-symfony channel');

  }
}


