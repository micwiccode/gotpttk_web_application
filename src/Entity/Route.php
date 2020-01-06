<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RouteRepository")
 */
class Route
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="idR")
     */
    private $idR;

    /**
     * @ORM\Column(type="integer", name="sumOfPointsGOT", precision=10)
     */
    private $sumOfPointsGOT;

    /**
     * @ORM\Column(type="float", name="routeLength", precision=10)
     */
    private $routeLength;

    /**
     * @ORM\Column(type="boolean", name="hasSectionsOutOfBase")
     */
    private $hasSectionsOutOfBase;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVerified;

    /**
     * @ORM\Column(type="date", nullable=TRUE)
     */
    private $routeDate;

    /**
     * @ORM\ManyToOne(targetEntity="Book")
     * @ORM\JoinColumn(name="idBook", referencedColumnName="idB", nullable=FALSE)
     */
    private $idBook;

    //Getters & Setters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSumOfPointsGOT(){
        return $this->sumOfPointsGOT;
    }
    public function setSumOfPointsGOT($sumOfPointsGOT){
        $this->sumOfPointsGOT = $sumOfPointsGOT;
    }

    public function getRouteLength(){
        return $this->routeLength;
    }
    public function setRouteLength($routeLength){
        $this->routeLength = $routeLength;
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
    
    public function getRouteDate(){
        return $this->routeDate;
    }
    public function setRouteDate($routeDate){
        $this->routeDate = $routeDate;
    }

    public function getIdBook(){
        return $this->idBook;
    }
    public function setIdBook($idBook){
        $this->idBook = $idBook;
    }
}
