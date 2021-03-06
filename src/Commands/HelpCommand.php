<?php

namespace Emanci\MysqlCompareFixer\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HelpCommand extends Command
{
    /**
     * Configures the current command.
     */
    protected function configure()
    {
        $helpCopy = $this->getHelpCopy();
        $this->setName('help')
             ->setDescription('Displays help for a command.')
             ->setHelp($helpCopy);
    }

    protected function getHelpCopy()
    {
        $template = <<<'EOF'

Compare two databases and fix differences

Usage:
  php mysql-compare-fixer <options>

Options:

Available commands:
  help      Displays help for a command.
  list      Lists commands
mdf
  mcf:diff  Show the difference information.
  mcf:fix   Fix the different.
EOF;

        return $template;
    }

    /**
     * Executes the current command.
     *
     * @param InputInterface  $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $help = $this->getHelp();

        $output->write($help);
    }
}
