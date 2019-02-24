<?php

namespace App\Command;

use App\Repository\CustomerRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCriteriaCommand extends Command
{
    protected static $defaultName = 'test:criteria';

    private $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;

        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $customer = $this->customerRepository->findOneByName('kalibora');

        foreach ($customer->getRecentOrders() as $order) {
            echo $order, PHP_EOL;
        }
    }
}
