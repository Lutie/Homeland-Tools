<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

trait NameTrait
{
    /**
     * @ORM\Column(type="string", length=128)
     * @Assert\NotNull()
     * @Assert\Type("string")
     * @Assert\Length(max=128)
     */
    private $name;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

}