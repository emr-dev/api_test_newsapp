<?php


namespace App\Command;


use App\Services\ParserService;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ParserCommand extends Command
{

    protected static $defaultName = 'parser:run';

    protected EntityManager $em;
    protected ParserService $service;
    public function __construct(EntityManager $objectManager, ParserService $parser)
    {
        $this->em = $objectManager;
        $this->service = $parser;

        parent::__construct();
    }
    protected function configure()
    {
        $this
            ->setName(self::$defaultName)
            ->setDescription('Starts command!');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->service->start();
    }


}