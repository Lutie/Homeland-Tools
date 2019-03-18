<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity()
 * @ORM\Table(name="users")
 * @UniqueEntity(fields={"username"}, errorPath="username")
 */
class User implements UserInterface
{

    use IdTrait;

    /**
     * @ORM\Column(type="string", length=128)
     * @Assert\NotNull()
     * @Assert\Type("string")
     * @Assert\Length(max=128)
     */
    private $login;

    /**
     * @ORM\Column(unique=true, type="string", length=128)
     * @Assert\NotNull()
     * @Assert\Type("string")
     * @Assert\Length(max=128)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=128)
     * @Assert\NotNull()
     * @Assert\Email(checkHost=true)
     * @Assert\Type("string")
     * @Assert\Length(max=128)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $password;

    /**
     * @ORM\Column(type="date")
     * @Assert\Date()
     */
    private $date;

    /**
     * @ORM\Column(type="boolean")
     * @Assert\NotNull()
     * @Assert\Type("bool")
     */
    private $isAdmin = false;

    /**
     * @ORM\OneToMany(targetEntity="FullStuff", mappedBy="user")
     * @ORM\JoinColumn(nullable=true)
     */
    private $fullStuff;

    /**
     * @Assert\Type("string")
     * @Assert\Length(min=6, max=128)
     */
    private $rawPassword;

    public function __construct()
    {
        $this->date = new \DateTime();
        $this->fullStuff = new ArrayCollection();
    }

    public function __toString()
    {
        return (string)$this->getUsername();
    }

    public function getRoles()
    {

        $roles = ['ROLE_USER'];

        if ($this->getIsAdmin()) {
            $roles[] = 'ROLE_ADMIN';
        }

        return $roles;
    }

    public function getSalt()
    {
        return null;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function eraseCredentials()
    {
        $this->rawPassword = null;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;
    }

    public function getRawPassword()
    {
        return $this->rawPassword;
    }

    public function setRawPassword($rawPassword)
    {
        $this->rawPassword = $rawPassword;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed $fullStuff
     */
    public function getFullStuff()
    {
        return $this->fullStuff;
    }

    public function addFullStuff(FullStuff $fullStuff)
    {
        if (!$this->fullStuff->contains($fullStuff)) {
            $this->fullStuff->add($fullStuff);
        }

        return $this;
    }

    public function removeFullStuff(FullStuff $fullStuff)
    {
        if ($this->fullStuff->contains($fullStuff)) {
            $this->fullStuff->removeElement($fullStuff);
        }

        return $this;
    }

}