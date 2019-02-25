<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrderRepository")
 * @ORM\Table(name="orders")
 */
class Order
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string")
     */
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="orders")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     */
    private $customer;

    public function __construct(\DateTimeInterface $date, string $product, Customer $customer)
    {
        $this->date = $date;
        $this->product = $product;
        $this->customer = $customer;
    }

    public function __toString(): string
    {
        return sprintf('%s: %s - %s', $this->id, $this->date->format('Y-m-d'), $this->product);
    }

    public function getDate() : \DateTimeInterface
    {
        return $this->date;
    }
}
