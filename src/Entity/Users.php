<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Users
 *
 * @ORM\Table(name="users", indexes={@ORM\Index(name="fk_users_role", columns={"role_id"})})
 * @ORM\Entity
 * @UniqueEntity(
 * fields= {"username"},
 * message= "el usuario que indicaste ya existe!"
 * )
 */
class Users implements UserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Regex(pattern ="/^[a-zA-Z ]+/", message="debe ingresar solamente caracteres de texto.")
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Regex(pattern ="/^[a-zA-Z ]+/", message="debe ingresar solamente caracteres de texto.")
     * @ORM\Column(name="surname", type="string", length=255, nullable=false)
     */
    private $surname;

    /**
     * @var string
     * @Assert\Regex(pattern ="/^[a-zA-Z ]+/", message="debe ingresar solamente caracteres de texto.")
     * @Assert\Email(message="must have the following structure user@domain.com")
     * @Assert\NotBlank()
     * @ORM\Column(name="username", type="string", length=150, nullable=false)
     */
    private $username;

    /**
     * @var string
     * @Assert\Length(min=8, minMessage="la contraseña debe ser como minimo 8 caracteres")
     * @Assert\NotBlank()
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @Assert\EqualTo(propertyPath="password")
     * @Assert\NotBlank()
     */
    public $conf_password;

    /**
     * @var \Roles
     *
     * @ORM\ManyToOne(targetEntity="Roles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="role_id", referencedColumnName="id")
     * })
     */
    private $role;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRole(): ?Roles
    {
        return $this->role;
    }

    public function setRole(?Roles $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function eraseCredentials()
    {
    }
    public function getSalt()
    {
    }
    public function getRoles()
    {
        return array('ROLE_USER');
    }
    function __toString()
    {
        return $this->name.' '.$this->surname;
    }


}
