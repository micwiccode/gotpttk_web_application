<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SectionRouteRepository")
 */
class SectionRoute
{
    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="Route")
     * @ORM\JoinColumn(name="idR", referencedColumnName="idR", nullable=FALSE)
     */
    private $idR;

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="Section")
     * @ORM\JoinColumn(name="idS", referencedColumnName="idS", nullable=FALSE)
     */
    private $idS;

    /**
     * @ORM\Column(type="date", nullable=TRUE)
     */
    private $sectionDate;


    public function __construct($idR, $idS)
    {
        $this->idR = $idR;
        $this->idS = $idS;
    }

    //Getters & Setters
    public function getIdR(): ?int
    {
        return $this->idR;
    }
    public function getIdS(): ?int
    {
        return $this->idS;
    }

    public function getSectionDate()
    {
        return $this->sectionDate;
    }
    public function setSectionDate($sectionDate)
    {
        $this->sectionDate = $sectionDate;
    }
}
