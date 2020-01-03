<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OdcinekTrasyRepository")
 */
class OdcinekTrasy
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $idTr;

    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $idO;

    /**
     * @ORM\Column(type="date", nullable=TRUE)
     */
    private $dataOdcinka;


    public function __construct($idTr, $idO){
        $this->idTr = $idTr;
        $this->idO = $idO;
    }



     //Getters & Setters
     public function getIdTr(): ?int
     {
         return $this->idTr;
     }
     public function getIdO(): ?int
     {
         return $this->idO;
     }
 
     public function getDataOdcinka(){
         return $this->dataOdcinka;
     }
     public function setDataOdcinka($dataOdcinka){
         $this->dataOdcinka = $dataOdcinka;
     }
}
