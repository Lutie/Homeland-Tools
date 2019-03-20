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

    /**
     * @ORM\Column(type="boolean")
     */
    private $isMechanical = false;

    /**
     * @ORM\Column(type="integer")
     */
    private $isDangerous = 0;

    public function __construct()
    {
        $this->stuff = new ArrayCollection();
    }

    public function __toString()
    {
        return (string)$this->getName();
    }

    /**
     * @return integer
     */
    public function getEffectOnScore()
    {
        return $this->effectOnScore;
    }

    /**
     * @param integer $effectOnScore
     */
    public function setEffectOnScore($effectOnScore): void
    {
        $this->effectOnScore = $effectOnScore;
    }

    /**
     * @return integer
     */
    public function getEffectOnAttackScore()
    {
        return $this->effectOnAttackScore;
    }

    /**
     * @param integer $effectOnAttackScore
     */
    public function setEffectOnAttackScore($effectOnAttackScore): void
    {
        $this->effectOnAttackScore = $effectOnAttackScore;
    }

    /**
     * @return integer
     */
    public function getEffectOnDefenseScore()
    {
        return $this->effectOnDefenseScore;
    }

    /**
     * @param integer $effectOnDefenseScore
     */
    public function setEffectOnDefenseScore($effectOnDefenseScore): void
    {
        $this->effectOnDefenseScore = $effectOnDefenseScore;
    }

    /**
     * @return integer
     */
    public function getEffectOnTacticalScore()
    {
        return $this->effectOnTacticalScore;
    }

    /**
     * @param integer $effectOnTacticalScore
     */
    public function setEffectOnTacticalScore($effectOnTacticalScore): void
    {
        $this->effectOnTacticalScore = $effectOnTacticalScore;
    }

    /**
     * @return integer
     */
    public function getEffectOnHardness()
    {
        return $this->effectOnHardness;
    }

    /**
     * @param integer $effectOnHardness
     */
    public function setEffectOnHardness($effectOnHardness): void
    {
        $this->effectOnHardness = $effectOnHardness;
    }

    /**
     * @return integer
     */
    public function getEffectOnReach()
    {
        return $this->effectOnReach;
    }

    /**
     * @param integer $effectOnReach
     */
    public function setEffectOnReach($effectOnReach): void
    {
        $this->effectOnReach = $effectOnReach;
    }

    /**
     * @return integer
     */
    public function getEffectOnSpeed()
    {
        return $this->effectOnSpeed;
    }

    /**
     * @param integer $effectOnSpeed
     */
    public function setEffectOnSpeed($effectOnSpeed): void
    {
        $this->effectOnSpeed = $effectOnSpeed;
    }

    /**
     * @return integer
     */
    public function getEffectOnQuickness()
    {
        return $this->effectOnQuickness;
    }

    /**
     * @param integer $effectOnQuickness
     */
    public function setEffectOnQuickness($effectOnQuickness): void
    {
        $this->effectOnQuickness = $effectOnQuickness;
    }

    /**
     * @return integer
     */
    public function getEffectOnPrice()
    {
        return $this->effectOnPrice;
    }

    /**
     * @param integer $effectOnPrice
     */
    public function setEffectOnPrice($effectOnPrice): void
    {
        $this->effectOnPrice = $effectOnPrice;
    }

    /**
     * @return integer
     */
    public function getEffectOnWeight()
    {
        return $this->effectOnWeight;
    }

    /**
     * @param integer $effectOnWeight
     */
    public function setEffectOnWeight($effectOnWeight): void
    {
        $this->effectOnWeight = $effectOnWeight;
    }

    /**
     * @return integer
     */
    public function getEffectOnPenality()
    {
        return $this->effectOnPenality;
    }

    /**
     * @param integer $effectOnPenality
     */
    public function setEffectOnPenality($effectOnPenality): void
    {
        $this->effectOnPenality = $effectOnPenality;
    }

    /**
     * @return integer
     */
    public function getEffectOnCounterAttackScore()
    {
        return $this->effectOnCounterAttackScore;
    }

    /**
     * @param integer $effectOnCounterAttackScore
     */
    public function setEffectOnCounterAttackScore($effectOnCounterAttackScore): void
    {
        $this->effectOnCounterAttackScore = $effectOnCounterAttackScore;
    }

    /**
     * @return integer
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

    /**
     * @return boolean
     */
    public function getIsMechanical()
    {
        return $this->isMechanical;
    }

    /**
     * @param boolean $isMechanical
     */
    public function setIsMechanical($isMechanical): void
    {
        $this->isMechanical = $isMechanical;
    }

    /**
     * @return integer
     */
    public function getIsDangerous()
    {
        return $this->isDangerous;
    }

    /**
     * @param integer $isDangerous
     */
    public function setIsDangerous($isDangerous): void
    {
        $this->isDangerous = $isDangerous;
    }

}