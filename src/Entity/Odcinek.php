<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OdcinekRepository")
 */
class Odcinek
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idO;

    /**
     * @ORM\Column(type="integer", precision=2, nullable=TRUE)
     */
    private $punktyGOT;

    /**
     * @ORM\Column(type="float", precision=10, nullable=TRUE)
     */
    private $dlugoscOdcinka;

    /**
     * @ORM\Column(type="float", precision=10, nullable=TRUE)
     */
    private $przewyzszenie;

    /**
     * @ORM\Column(type="integer")
     */
    private $punktStartowy;

    /**
     * @ORM\Column(type="integer")
     */
    private $punktKoncowy;

    /**
     * @ORM\Column(type="integer")
     */
    private $idG;



    //Getters & Setters
    public function getIdO(): ?int
    {
        return $this->idO;
    }

    public function getPunktyGOT(){
        return $this->punktyGOT;
    }
    public function setPunktyGOT($punktyGOT){
        $this->punktyGOT = $punktyGOT;
    }

    public function getDlugoscOdcinka(){
        return $this->dlugoscOdcinka;
    }
    public function setDlugoscOdcinka($dlugoscOdcinka){
        $this->dlugoscOdcinka = $dlugoscOdcinka;
    }

    public function getPrzewyzszenie(){
        return $this->przewyzszenie;
    }
    public function setPrzewyzszenie($przewyzszenie){
        $this->przewyzszenie = $przewyzszenie;
    }

    public function getPunktStartowy(){
        return $this->punktStartowy;
    }
    public function setPunktStartowy($punktStartowy){
        $this->punktStartowy = $punktStartowy;
    }

    public function getPunktKoncowy(){
        return $this->punktKoncowy;
    }
    public function setPunktKoncowy($punktKoncowy){
        $this->punktKoncowy = $punktKoncowy;
    }

}
