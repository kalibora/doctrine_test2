<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CustomerRepository")
 * @ORM\Table(name="customers")
 */
class Customer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Order", mappedBy="customer", cascade={"persist", "remove"})
     */
    private $orders;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->orders = new ArrayCollection();
    }

    public function order(\DateTimeImmutable $date, string $product) : self
    {
        $this->orders[] = new Order($date, $product, $this);

        return $this;
    }

    public function getRecentOrders($limit = 5) : Collection
    {
        $criteria = Criteria::create()
            ->orderBy(['date' => Criteria::DESC])
            ->setMaxResults($limit)
        ;

        return $this->orders->matching($criteria);
    }
}
