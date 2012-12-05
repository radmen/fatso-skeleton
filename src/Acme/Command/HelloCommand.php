<?php

namespace Acme\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HelloCommand extends Command {
  
  public function configure() {
    $this->setName('acme:hello')
      ->setDescription('Prints hello fatso');
  }
  
  public function execute(InputInterface $input, OutputInterface $output) {
    $output->write('Hello fatso', true);
  }
  
}
