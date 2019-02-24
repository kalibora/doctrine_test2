<?php

namespace App\Criteria;

use App\Entity\Order;
use Otobank\Doctrine\Collections\TargetAwareCriteria;

class OrderCriteria extends TargetAwareCriteria
{
    public static function getTargetClass() : string
    {
        return Order::class;
    }
}
