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
            ->order(new \DateTimeImmutable('2019-01-01'), 'おはぎ')
            ->order(new \DateTimeImmutable('2019-01-02'), 'ようかん')
            ->order(new \DateTimeImmutable('2019-01-03'), '茶饅頭')
            ->order(new \DateTimeImmutable('2019-01-04'), '芋ようかん')
            ->order(new \DateTimeImmutable('2019-01-05'), 'ようかん')
            ->order(new \DateTimeImmutable('2019-01-06'), 'とらまき')
            ->order(new \DateTimeImmutable('2019-01-07'), 'みたらし団子')
            ->order(new \DateTimeImmutable('2019-01-08'), 'とらまき')
            ->order(new \DateTimeImmutable('2019-01-09'), '磯辺団子')
            ->order(new \DateTimeImmutable('2019-01-10'), '茶饅頭')
        ;

        $manager->persist($customer);
        $manager->flush();
    }
}
