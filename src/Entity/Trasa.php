<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TrasaRepository")
 */
class Trasa
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idTr;

    /**
     * @ORM\Column(type="integer", precision=10)
     */
    private $SumaPunktowGOT;

    /**
     * @ORM\Column(type="float", precision=10)
     */
    private $dlugoscTrasy;

    /**
     * @ORM\Column(type="boolean")
     */
    private $czyZawieraOdcinkiSpozaWykazu;

    /**
     * @ORM\Column(type="boolean")
     */
    private $zweryfikowana;

    /**
     * @ORM\Column(type="date", nullable=TRUE)
     */
    private $dataTrasy;

    /**
     * @ORM\Column(type="integer")
     */
    private $ksiazeczkaId;

    

    //Getters & Setters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSumaPunktowGOT(){
        return $this->sumaPunktowGOT;
    }
    public function setSumaPunktowGOT($sumaPunktowGOT){
        $this->sumaPunktowGOT = $sumaPunktowGOT;
    }

    public function getDlugoscTrasy(){
        return $this->dlugoscTrasy;
    }
    public function setDlugoscTrasy($dlugoscTrasy){
        $this->dlugoscTrasy = $dlugoscTrasy;
    }

    public function getCzyZawieraOdcinkiSpozaWykazu(){
        return $this->czyZawieraOdcinkiSpozaWykazu;
    }
    public function setCzyZawieraOdcinkiSpozaWykazu($czyZawieraOdcinkiSpozaWykazu){
        $this->czyZawieraOdcinkiSpozaWykazu = $czyZawieraOdcinkiSpozaWykazu;
    }

    public function getZweryfikowana(){
        return $this->zweryfikowana;
    }
    public function setZweryfikowana($zweryfikowana){
        $this->zweryfikowana = $zweryfikowana;
    }
    
    public function getDataTrasy(){
        return $this->dataTrasy;
    }
    public function setDataTrasy($dataTrasy){
        $this->dataTrasy = $dataTrasy;
    }

    public function getKsiazeczkaID(){
        return $this->ksiazeczkaID;
    }
    public function setKsiazeczkaID($ksiazeczkaID){
        $this->ksiazeczkaID = $ksiazeczkaID;
    }


}
