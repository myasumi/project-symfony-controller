<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jefedepartment
 *
 * @ORM\Table(name="jefedepartment", indexes={@ORM\Index(name="fk_jefedepartment_users", columns={"users_id"}), @ORM\Index(name="fk_jefedepartment_teacher", columns={"teacher_id"})})
 * @ORM\Entity
 */
class Jefedepartment
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
     * @var \DateTime
     *
     * @ORM\Column(name="fechaingreso", type="date", nullable=false)
     */
    private $fechaingreso;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechasalida", type="date", nullable=false)
     */
    private $fechasalida;

    /**
     * @var \Teacher
     *
     * @ORM\ManyToOne(targetEntity="Teacher")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="teacher_id", referencedColumnName="id")
     * })
     */
    private $teacher;

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

    public function getFechaingreso(): ?\DateTimeInterface
    {
        return $this->fechaingreso;
    }

    public function setFechaingreso(\DateTimeInterface $fechaingreso): self
    {
        $this->fechaingreso = $fechaingreso;

        return $this;
    }

    public function getFechasalida(): ?\DateTimeInterface
    {
        return $this->fechasalida;
    }

    public function setFechasalida(\DateTimeInterface $fechasalida): self
    {
        $this->fechasalida = $fechasalida;

        return $this;
    }

    public function getTeacher(): ?Teacher
    {
        return $this->teacher;
    }

    public function setTeacher(?Teacher $teacher): self
    {
        $this->teacher = $teacher;

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
