<?php

namespace App\Twig;

use App\Entity\FullStuff;
use App\Entity\Stuff;
use App\Entity\StuffType;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class StuffExtension extends AbstractExtension
{
    const QUALITY_PRICE_MOD = [
        -1 => .25, -1 => .33, -1 => .5, -1 => .66, -1 => .75,
        0 => 1, 1 => 3, 2 => 6, 3 => 12, 4 => 25, 5 => 50, 6 => 100
    ];

    public function getFilters()
    {
        return [
            new TwigFilter('stuffWeight', [$this, 'stuffWeight']),
            new TwigFilter('stuffPrice', [$this, 'stuffPrice']),
        ];
    }

    public function stuffWeight(Stuff $stuff)
    {
        $weight = $stuff->getCategory()*5 + $stuff->getHeight() + $stuff->getWeight()
            + $stuff->getArmorIsAdvanced() * 2 + $stuff->getShape() * 2
            + $stuff->getFamily()->getEffectOnWeight();
        foreach($stuff->getParticularities() as $particularity) {
            $weight += $particularity->getEffectOnWeight();
        }
        return $weight;
    }

    public function stuffPrice(Stuff $stuff)
    {
        $price = $stuff->getType()->getPrice();
        $price += $stuff->getFamily()->getEffectOnPrice();
        foreach($stuff->getParticularities() as $particularity) {
            $price += $particularity->getEffectOnPrice();
        }
        $price += $stuff->getWeight() * $stuff->getType()->getAddedPriceByWeight();
        $price += $stuff->getHeight() * $stuff->getType()->getAddedPriceByHeight();
        $price += $stuff->getShape() * $stuff->getType()->getAddedPriceByShape();
        $price += $stuff->getArmorIsAdvanced() * 10; // TODO : to change to a better system
        $price = $price * ($stuff->getCategory() + 1);
        return $price;
    }

    public function fullStuffPrice(FullStuff $fullStuff)
    {
        $price = $this->stuffPrice($fullStuff->getStuff());
        $price = $price * self::QUALITY_PRICE_MOD[$fullStuff->getQuality()];
        // TODO : other things to complete fullstuff price
        return $price;
    }
}