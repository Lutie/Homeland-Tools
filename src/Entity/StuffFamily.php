<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table(name="stuff_family")
 */
class StuffFamily
{

    use IdTrait;

    use NameTrait;

    use DescriptionTrait;

    /**
     * @ORM\OneToMany(targetEntity="Stuff", mappedBy="family")
     * @ORM\JoinColumn(nullable=true)
     */
    private $stuff;

    /**
     * @ORM\Column(type="integer", length=3)
     * @Assert\NotNull()
     * @Assert\Type("integer")
     * @Assert\Range( min = -3, max = 3 )
     */
    private $effectOnScore = 0;

    /**
     * @ORM\Column(type="integer", length=3)
     * @Assert\NotNull()
     * @Assert\Type("integer")
     * @Assert\Range( min = -3, max = 3 )
     */
    private $effectOnAttackScore = 0;

    /**
     * @ORM\Column(type="integer", length=3)
     * @Assert\NotNull()
     * @Assert\Type("integer")
     * @Assert\Range( min = -3, max = 3 )
     */
    private $effectOnDefenseScore = 0;

    /**
     * @ORM\Column(type="integer", length=3)
     * @Assert\NotNull()
     * @Assert\Type("integer")
     * @Assert\Range( min = -3, max = 3 )
     */
    private $effectOnTacticalScore = 0;

    /**
     * @ORM\Column(type="integer", length=3)
     * @Assert\NotNull()
     * @Assert\Type("integer")
     * @Assert\Range( min = -3, max = 3 )
     */
    private $effectOnHardness = 0;

    /**
     * @ORM\Column(type="integer", length=3)
     * @Assert\NotNull()
     * @Assert\Type("integer")
     * @Assert\Range( min = -3, max = 3 )
     */
    private $effectOnReach = 0;

    /**
     * @ORM\Column(type="integer", length=3)
     * @Assert\NotNull()
     * @Assert\Type("integer")
     * @Assert\Range( min = -3, max = 3 )
     */
    private $effectOnSpeed = 0;

    /**
     * @ORM\Column(type="integer", length=3)
     * @Assert\NotNull()
     * @Assert\Type("integer")
     * @Assert\Range( min = -3, max = 3 )
     */
    private $effectOnQuickness = 0;

    /**
     * @ORM\Column(type="integer", length=5)
     * @Assert\NotNull()
     * @Assert\Type("integer")
     * @Assert\Range( min = -3, max = 3 )
     */
    private $effectOnPrice = 0;

    /**
     * @ORM\Column(type="integer", length=3)
     * @Assert\NotNull()
     * @Assert\Type("integer")
     * @Assert\Range( min = -3, max = 3 )
     */
    private $effectOnWeight = 0;

    /**
     * @ORM\Column(type="integer", length=3)
     * @Assert\NotNull()
     * @Assert\Type("integer")
     * @Assert\Range( min = -3, max = 3 )
     */
    private $effectOnPenality = 0;

    /**
     * @ORM\Column(type="integer", length=3)
     * @Assert\NotNull()
     * @Assert\Type("integer")
     * @Assert\Range( min = -3, max = 3 )
     */
    private $effectOnCounterAttackScore = 0;

    /**
     * @ORM\Column(type="integer", length=3)
     * @Assert\NotNull()
     * @Assert\Type("integer")
     * @Assert\Range( min = -3, max = 3 )
     */
    private $effectOnAdversaryDefenseScore = 0;

    public function __construct()
    {
        $this->stuff = new ArrayCollection();
    }

    public function __toString()
    {
        return (string)$this->getName();
    }

    /**
     * @return mixed
     */
    public function getEffectOnScore()
    {
        return $this->effectOnScore;
    }

    /**
     * @param mixed $effectOnScore
     */
    public function setEffectOnScore($effectOnScore): void
    {
        $this->effectOnScore = $effectOnScore;
    }

    /**
     * @return mixed
     */
    public function getEffectOnAttackScore()
    {
        return $this->effectOnAttackScore;
    }

    /**
     * @param mixed $effectOnAttackScore
     */
    public function setEffectOnAttackScore($effectOnAttackScore): void
    {
        $this->effectOnAttackScore = $effectOnAttackScore;
    }

    /**
     * @return mixed
     */
    public function getEffectOnDefenseScore()
    {
        return $this->effectOnDefenseScore;
    }

    /**
     * @param mixed $effectOnDefenseScore
     */
    public function setEffectOnDefenseScore($effectOnDefenseScore): void
    {
        $this->effectOnDefenseScore = $effectOnDefenseScore;
    }

    /**
     * @return mixed
     */
    public function getEffectOnTacticalScore()
    {
        return $this->effectOnTacticalScore;
    }

    /**
     * @param mixed $effectOnTacticalScore
     */
    public function setEffectOnTacticalScore($effectOnTacticalScore): void
    {
        $this->effectOnTacticalScore = $effectOnTacticalScore;
    }

    /**
     * @return mixed
     */
    public function getEffectOnHardness()
    {
        return $this->effectOnHardness;
    }

    /**
     * @param mixed $effectOnHardness
     */
    public function setEffectOnHardness($effectOnHardness): void
    {
        $this->effectOnHardness = $effectOnHardness;
    }

    /**
     * @return mixed
     */
    public function getEffectOnReach()
    {
        return $this->effectOnReach;
    }

    /**
     * @param mixed $effectOnReach
     */
    public function setEffectOnReach($effectOnReach): void
    {
        $this->effectOnReach = $effectOnReach;
    }

    /**
     * @return mixed
     */
    public function getEffectOnSpeed()
    {
        return $this->effectOnSpeed;
    }

    /**
     * @param mixed $effectOnSpeed
     */
    public function setEffectOnSpeed($effectOnSpeed): void
    {
        $this->effectOnSpeed = $effectOnSpeed;
    }

    /**
     * @return mixed
     */
    public function getEffectOnQuickness()
    {
        return $this->effectOnQuickness;
    }

    /**
     * @param mixed $effectOnQuickness
     */
    public function setEffectOnQuickness($effectOnQuickness): void
    {
        $this->effectOnQuickness = $effectOnQuickness;
    }

    /**
     * @return mixed
     */
    public function getEffectOnPrice()
    {
        return $this->effectOnPrice;
    }

    /**
     * @param mixed $effectOnPrice
     */
    public function setEffectOnPrice($effectOnPrice): void
    {
        $this->effectOnPrice = $effectOnPrice;
    }

    /**
     * @return mixed
     */
    public function getEffectOnWeight()
    {
        return $this->effectOnWeight;
    }

    /**
     * @param mixed $effectOnWeight
     */
    public function setEffectOnWeight($effectOnWeight): void
    {
        $this->effectOnWeight = $effectOnWeight;
    }

    /**
     * @return mixed
     */
    public function getEffectOnPenality()
    {
        return $this->effectOnPenality;
    }

    /**
     * @param mixed $effectOnPenality
     */
    public function setEffectOnPenality($effectOnPenality): void
    {
        $this->effectOnPenality = $effectOnPenality;
    }

    /**
     * @return mixed
     */
    public function getEffectOnCounterAttackScore()
    {
        return $this->effectOnCounterAttackScore;
    }

    /**
     * @param mixed $effectOnCounterAttackScore
     */
    public function setEffectOnCounterAttackScore($effectOnCounterAttackScore): void
    {
        $this->effectOnCounterAttackScore = $effectOnCounterAttackScore;
    }

    /**
     * @return mixed
     */
    public function getEffectOnAdversaryDefenseScore()
    {
        return $this->effectOnAdversaryDefenseScore;
    }

    /**
     * @param mixed $effectOnAdversaryDefenseScore
     */
    public function setEffectOnAdversaryDefenseScore($effectOnAdversaryDefenseScore): void
    {
        $this->effectOnAdversaryDefenseScore = $effectOnAdversaryDefenseScore;
    }

    public function getStuff()
    {
        return $this->stuff;
    }

    public function removeStuff(Stuff $stuff)
    {
        if ($this->stuff->contains($stuff)) {
            $this->stuff->removeElement($stuff);
        }
        return $this;
    }

    public function addStuff(Stuff $stuff)
    {
        if (!$this->stuff->contains($stuff)) {
            $this->stuff->add($stuff);
        }
        return $this;
    }

}