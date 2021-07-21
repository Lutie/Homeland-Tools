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
        -5 => .25, -4 => .33, -3 => .5, -2 => .66, -1 => .75,
        0 => 1, 1 => 3, 2 => 6, 3 => 12, 4 => 25, 5 => 50, 6 => 100
    ];

    const D6_RANGE = 6;
    const D6_AVERAGE = 3.5;

    public function getFilters()
    {
        return [
            new TwigFilter('stuffWeight', [$this, 'stuffWeight']),
            new TwigFilter('stuffPrice', [$this, 'stuffPrice']),
            new TwigFilter('stuffAttackScore', [$this, 'stuffAttackScore']),
            new TwigFilter('stuffDefenseScore', [$this, 'stuffDefenseScore']),
            new TwigFilter('stuffTacticalScore', [$this, 'stuffTacticalScore']),
            new TwigFilter('stuffRange', [$this, 'stuffRange']),
            new TwigFilter('stuffPenalities', [$this, 'stuffPenalities']),
            new TwigFilter('stuffHardness', [$this, 'stuffHardness']),
            new TwigFilter('stuffSpeed', [$this, 'stuffSpeed']),
            new TwigFilter('stuffQuickness', [$this, 'stuffQuickness']),
            new TwigFilter('stuffPenetration', [$this, 'stuffPenetration']),
            new TwigFilter('stuffMagazine', [$this, 'stuffMagazine']),
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

    public function stuffAttackScore(Stuff $stuff)
    {
        $dice = 2 + $stuff->getCategory();
        $dice += $stuff->getFamily()->getEffectOnAttackScore() + $stuff->getFamily()->getEffectOnScore();
        foreach($stuff->getParticularities() as $particularity) {
            $dice += $particularity->getEffectOnAttackScore();
            $dice += $particularity->getEffectOnScore();
        }
        $fixe = $stuff->getCategory() + $stuff->getWeight() * 2;
        $fixe += $stuff->getFamily()->getIsDangerous() * $stuff->getCategory();
        $rangeMin = $dice + $fixe;
        $rangeMax = $dice * self::D6_RANGE + $fixe;
        $rangeMid = $dice * self::D6_AVERAGE + $fixe;

        return $dice . "d6+" . $fixe . " (" . $rangeMin . "~" . $rangeMax . ") (~". number_format($rangeMid, 0) . ")";
    }

    public function stuffDefenseScore(Stuff $stuff)
    {
        $dice = 2 + $stuff->getCategory();
        $dice += $stuff->getFamily()->getEffectOnDefenseScore() + $stuff->getFamily()->getEffectOnScore();
        foreach($stuff->getParticularities() as $particularity) {
            $dice += $particularity->getEffectOnDefenseScore();
            $dice += $particularity->getEffectOnScore();
        }
        $fixe = $stuff->getCategory() + $stuff->getHeight() * 2;
        $rangeMin = $dice + $fixe;
        $rangeMax = $dice * self::D6_RANGE + $fixe;
        $rangeMid = $dice * self::D6_AVERAGE + $fixe;

        return $dice . "d6+" . $fixe . " (" . $rangeMin . "~" . $rangeMax . ") (~". number_format($rangeMid, 0) . ")";
    }

    public function stuffTacticalScore(Stuff $stuff)
    {
        $dice = 2 + $stuff->getCategory();
        $dice += $stuff->getFamily()->getEffectOnTacticalScore() + $stuff->getFamily()->getEffectOnScore();
        foreach($stuff->getParticularities() as $particularity) {
            $dice += $particularity->getEffectOnTacticalScore();
            $dice += $particularity->getEffectOnScore();
        }
        $fixe = $stuff->getCategory() + ($stuff->getWeight()>0) * 2 + ($stuff->getHeight()>0) * 2;
        $rangeMin = $dice + $fixe;
        $rangeMax = $dice * self::D6_RANGE + $fixe;
        $rangeMid = $dice * self::D6_AVERAGE + $fixe;

        return $dice . "d6+" . $fixe . " (" . $rangeMin . "~" . $rangeMax . ") (~". number_format($rangeMid, 0) . ")";
    }

    public function stuffRange(Stuff $stuff)
    {
        $range = $stuff->getCategory() + $stuff->getHeight() + $stuff->getFamily()->getEffectOnReach();
        foreach($stuff->getParticularities() as $particularity) {
            $range += $particularity->getEffectOnReach();
        }
        return $range;
    }

    public function stuffHardness(Stuff $stuff)
    {
        $hardness = $stuff->getCategory()*2 + $stuff->getWeight() + $stuff->getFamily()->getEffectOnHardness();
        foreach($stuff->getParticularities() as $particularity) {
            $hardness += $particularity->getEffectOnHardness();
        }
        return $hardness;
    }

    public function stuffPenalities(Stuff $stuff)
    {
        $penalities = $stuff->getCategory() * 2 + $stuff->getHeight() + $stuff->getWeight();
        $penalities += $stuff->getFamily()->getEffectOnPenality();
        foreach($stuff->getParticularities() as $particularity) {
            $penalities += $particularity->getEffectOnPenality();
        }
        return $penalities;
    }

    public function stuffSpeed(Stuff $stuff)
    {
        $speed = 0;
        $speed += $stuff->getFamily()->getEffectOnSpeed();
        $speed += $stuff->getHeight(); // TODO : is this bonus alright ?
        foreach($stuff->getParticularities() as $particularity) {
            $speed += $particularity->getEffectOnSpeed();
        }
        return $speed;
    }

    public function stuffQuickness(Stuff $stuff)
    {
        $quickness = 0;
        $quickness += $stuff->getFamily()->getEffectOnQuickness();
        foreach($stuff->getParticularities() as $particularity) {
            $quickness += $particularity->getEffectOnQuickness();
        }
        return $quickness;
    }

    public function stuffPenetration(Stuff $stuff)
    {
        $penetration = 0;
        $penetration += $stuff->getFamily()->getIsMechanical() * $stuff->getCategory();
        return $penetration;
    }

    public function stuffMagazine(Stuff $stuff)
    {
        $magazine = $stuff->getFamily()->getMagazineCapacity();
        $magazine -= $stuff->getCategory() * $stuff->getFamily()->getAddedMagazineByCategory();
        foreach($stuff->getParticularities() as $particularity) {
            $magazine += $particularity->getEffectOnMagazine();
        }
        return $magazine;
    }

    // TODO : put this in a proper extension for all the fullStuff things

    public function fullStuffPenalities(FullStuff $fullStuff)
    {
        $penalities = $this->stuffPenalities($fullStuff->getStuff());
        $penalities -= $fullStuff->getQuality();
        return $penalities;
    }

    public function fullStuffPrice(FullStuff $fullStuff)
    {
        $price = $this->stuffPrice($fullStuff->getStuff());
        $price = $price * self::QUALITY_PRICE_MOD[$fullStuff->getQuality()];
        // TODO : other things to complete fullstuff price
        return $price;
    }
}