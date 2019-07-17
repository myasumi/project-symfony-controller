<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Teacher
 *
 * @ORM\Table(name="teacher", indexes={@ORM\Index(name="fk_teacher_users", columns={"users_id"}), @ORM\Index(name="fk_teacher_department", columns={"departament_id"})})
 * @ORM\Entity
 * @UniqueEntity(
 * fields= {"codigo"},
 * message= "el docente que indicaste ya existe!"
 * )
 */
class Teacher
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
     * @ORM\Column(name="condicion", type="string", length=255, nullable=false)
     */
    private $condicion;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Regex(pattern ="/^[a-zA-Z ]+/", message="debe ingresar solamente caracteres de texto.")
     * @ORM\Column(name="categoria", type="string", length=100, nullable=false)
     */
    private $categoria;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Regex(pattern ="/^[0-9 ]+/", message="debe ingresar solamente caracteres que sean números.")
     * @ORM\Column(name="codigo", type="string", length=50, nullable=false)
     */
    private $codigo;

    /**
     * @var \Departament
     *
     * @ORM\ManyToOne(targetEntity="Departament")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="departament_id", referencedColumnName="id")
     * })
     */
    private $departament;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="users_id", referencedColumnName="id")
     * })
     */
    private $users;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCondicion(): ?string
    {
        return $this->condicion;
    }

    public function setCondicion(string $condicion): self
    {
        $this->condicion = $condicion;

        return $this;
    }

    public function getCategoria(): ?string
    {
        return $this->categoria;
    }

    public function setCategoria(string $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getDepartament(): ?Departament
    {
        return $this->departament;
    }

    public function setDepartament(?Departament $departament): self
    {
        $this->departament = $departament;

        return $this;
    }

    public function getUsers(): ?Users
    {
        return $this->users;
    }

    public function setUsers(?Users $users): self
    {
        $this->users = $users;

        return $this;
    }


}
