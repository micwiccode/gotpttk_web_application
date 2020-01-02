<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StopienRepository")
 */
class Stopien
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idS;

    /**
     * @ORM\Column(type="text", length=60)
     */
    private $nazwa;

    /**
     * @ORM\Column(type="integer", precision=3)
     */
    private $wymaganaLiczbaPunktow;



    //Getters & Setters
    public function getIdS(): ?int
    {
        return $this->idS;
    }

    public function getNazwa(){
        return $this->nazwa;
    }
    public function setNazwa($nazwa){
        $this->nazwa = $nazwa;
    }

    public function getWymaganaLiczbaPunktow(){
        return $this->wymaganaLiczbaPunktow;
    }
    public function setLiczbaPunktow($wymaganaLiczbaPunktow){
        $this->wymaganaLiczbaPunktow = $wymaganaLiczbaPunktow;
    }

}
