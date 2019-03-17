<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

trait DescriptionTrait
{
    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     * @Assert\Type("string")
     * @Assert\Length(max=128)
     */
    private $description;

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

}