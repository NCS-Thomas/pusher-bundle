<?php
namespace Lsv\PusherBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class TestPushCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('lsv:pusher:test')
            ->addOption(
                'channels',
                null,
                InputOption::VALUE_OPTIONAL,
                'Channels to send a test push to',
                ['test', 'test2']
            )
            ->addOption(
                'event',
                null,
                InputOption::VALUE_OPTIONAL,
                'Event name to send the test push to',
                'test'
            )
            ->addOption(
                'data',
                null,
                InputOption::VALUE_OPTIONAL,
                'Event data to send the test push to',
                'test'
            )
            ->setDescription('Send a pusher test notification')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this
            ->getContainer()
            ->get('lsv_pusher.pusher')
            ->trigger(
                $input->getOption('channels'),
                $input->getOption('event'),
                $input->getOption('data')
            )
        ;
    }

}
