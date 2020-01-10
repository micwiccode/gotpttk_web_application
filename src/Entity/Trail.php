<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TrailRepository")
 */
class Trail
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="idT")
     */
    private $idT;

    /**
     * @ORM\Column(type="integer", name="sumOfPointsGOT", precision=10)
     */
    private $sumOfPointsGOT;

    /**
     * @ORM\Column(type="float", name="trailLength", precision=10)
     */
    private $trailLength;

    /**
     * @ORM\Column(type="boolean", name="hasSectionsOutOfBase")
     */
    private $hasSectionsOutOfBase;

    /**
     * @ORM\Column(type="boolean", name="isVerified")
     */
    private $isVerified;

    /**
     * @ORM\Column(type="date", nullable=TRUE, name="trailDate")
     */
    private $trailDate;

    /**
     * @ORM\ManyToOne(targetEntity="Book")
     * @ORM\JoinColumn(name="idBook", referencedColumnName="idB", nullable=FALSE)
     */
    private $idBook;

    //Getters & Setters
    public function getIdT(): ?int
    {
        return $this->idT;
    }

    public function getSumOfPointsGOT(){
        return $this->sumOfPointsGOT;
    }
    public function setSumOfPointsGOT($sumOfPointsGOT){
        $this->sumOfPointsGOT = $sumOfPointsGOT;
    }

    public function getTrailLength(){
        return $this->trailLength;
    }
    public function setTrailLength($trailLength){
        $this->trailLength = $trailLength;
    }

    public function getHasSectionsOutOfBase(){
        return $this->hasSectionsOutOfBase;
    }
    public function setHasSectionsOutOfBase($hasSectionsOutOfBase){
        $this->hasSectionsOutOfBase = $hasSectionsOutOfBase;
    }

    public function getIsVerified(){
        return $this->isVerified;
    }
    public function setIsVerified($isVerified){
        $this->isVerified = $isVerified;
    }
    
    public function getTrailDate(){
        return $this->trailDate;
    }
    public function setTrailDate($trailDate){
        $this->trailDate = $trailDate;
    }

    public function getIdBook(){
        return $this->idBook;
    }
    public function setIdBook($idBook){
        $this->idBook = $idBook;
    }
}
