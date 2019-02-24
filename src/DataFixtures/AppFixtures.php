<?php

namespace App\DataFixtures;

use App\Entity\Customer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $customer = (new Customer('kalibora'))
            ->order(new \DateTimeImmutable('2019-01-01'), 100)
            ->order(new \DateTimeImmutable('2019-01-02'), 200)
            ->order(new \DateTimeImmutable('2019-01-03'), 300)
            ->order(new \DateTimeImmutable('2019-01-04'), 150)
            ->order(new \DateTimeImmutable('2019-01-05'), 100)
            ->order(new \DateTimeImmutable('2019-01-06'), 1000)
            ->order(new \DateTimeImmutable('2019-01-07'), 400)
            ->order(new \DateTimeImmutable('2019-01-08'), 2000)
            ->order(new \DateTimeImmutable('2019-01-09'), 250)
            ->order(new \DateTimeImmutable('2019-01-10'), 500)
        ;

        $manager->persist($customer);
        $manager->flush();
    }
}
