<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StopienKsiazeczkiRepository")
 */
class StopienKsiazeczki
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $idK;

    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $idS;

    /**
     * @ORM\Column(type="date", nullable=TRUE)
     */
    private $dataZdobycia;

    
    public function __construct($idK, $idS){
        $this->idK = $idK;
        $this->idS = $idS;
    }


    
    //Getters & Setters
    public function getIdK(): ?int
    {
        return $this->idK;
    }
   
    public function getIdS(): ?int
    {
        return $this->idS;
    }

    public function getDataZdobycia(){
        return $this->dataZdobycia;
    }
    public function setDataZdobycia($dataZdobycia){
        $this->dataZdobycia = $dataZdobycia;
    }
}
