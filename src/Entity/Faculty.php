<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Faculty
 *
 * @ORM\Table(name="faculty")
 * @ORM\Entity
 * @UniqueEntity(
 * fields= {"name"},
 * message= "la facultad que indicaste ya existe!"
 * )
 */
class Faculty
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
     * @ORM\Column(name="acronym", type="string", length=55, nullable=false)
     */
    private $acronym;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Regex(pattern ="/^[a-zA-Z ]+/", message="debe ingresar solamente caracteres de texto.")
     * @ORM\Column(name="vision", type="string", length=255, nullable=false)
     */
    private $vision;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Regex(pattern ="/^[a-zA-Z ]+/", message="debe ingresar solamente caracteres de texto.")
     * @ORM\Column(name="mission", type="string", length=255, nullable=false)
     */
    private $mission;

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

    public function getAcronym(): ?string
    {
        return $this->acronym;
    }

    public function setAcronym(string $acronym): self
    {
        $this->acronym = $acronym;

        return $this;
    }

    public function getVision(): ?string
    {
        return $this->vision;
    }

    public function setVision(string $vision): self
    {
        $this->vision = $vision;

        return $this;
    }

    public function getMission(): ?string
    {
        return $this->mission;
    }

    public function setMission(string $mission): self
    {
        $this->mission = $mission;

        return $this;
    }


}
