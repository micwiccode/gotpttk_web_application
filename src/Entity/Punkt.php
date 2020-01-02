<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PunktRepository")
 */
class Punkt
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idPu;

    /**
     * @ORM\Column(type="text", length=50)
     */
    private $nazwa;

    /**
     * @ORM\Column(type="float", precision=10, nullable=TRUE)
     */
    private $szerokoscGeograficzna;

     /**
     * @ORM\Column(type="float", precision=10, nullable=TRUE)
     */
    private $dlugoscGeograficzna;



    //Getters & Setters
    public function getIdPu(): ?int
    {
        return $this->idPu;
    }

    public function getNazwa(){
        return $this->nazwa;
    }
    public function setNazwa($nazwa){
        $this->nazwa = $nazwa;
    }

    public function getSzerokosc(){
        return $this->szerokoscGeograficzna;
    }
    public function setSzerokosc($szerokosc){
        $this->szerokoscGeograficzna = $szerokosc;
    }

    public function getDlugosc(){
        return $this->dlugoscGeograficzna;
    }
    public function setDlugosc($dlugosc){
        $this->dlugoscGeograficzna = $dlugosc;
    }
}
