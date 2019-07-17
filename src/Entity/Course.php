<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Course
 *
 * @ORM\Table(name="course", indexes={@ORM\Index(name="fk_course_school", columns={"school_id"})})
 * @ORM\Entity
 * @UniqueEntity(
 * fields= {"codigo"},
 * message= "el curso que indicaste ya existe!"
 * )
 */
class Course
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
     * @Assert\Regex(pattern ="/[A-Z]\d{1,9}/i")
     * @ORM\Column(name="codigo", type="string", length=150, nullable=false)
     */
    private $codigo;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Regex("/[a-zA-Z ]+/")
     * @ORM\Column(name="name", type="string", length=150, nullable=false)
     */
    private $name;

    /**
     * @var int
     * @Assert\NotBlank()
     * @Assert\Regex(pattern ="/[1-9 ]+/", message="numbers [1-5]")
     * @ORM\Column(name="credits", type="integer", nullable=false)
     */
    private $credits;

    /**
     * @var \School
     *
     * @ORM\ManyToOne(targetEntity="School")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="school_id", referencedColumnName="id")
     * })
     */
    private $school;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCredits(): ?int
    {
        return $this->credits;
    }

    public function setCredits(int $credits): self
    {
        $this->credits = $credits;

        return $this;
    }

    public function getSchool(): ?School
    {
        return $this->school;
    }

    public function setSchool(?School $school): self
    {
        $this->school = $school;

        return $this;
    }

    function __toString()
    {
        return $this->name;
    }

}
