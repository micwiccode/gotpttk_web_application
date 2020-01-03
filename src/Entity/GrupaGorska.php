<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GrupaGorskaRepository")
 */
class GrupaGorska
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idG;

    /**
     * @ORM\Column(type="text", length=30)
     */
    private $nazwa;

    /**
     * @ORM\Column(type="text", length=5)
     */
    private $kodGrupy;


    //Getters & Setters
    public function getIdG(): ?int
    {
        return $this->idG;
    }

    public function getNazwa(){
        return $this->nazwa;
    }
    public function setNazwa($nazwa){
        $this->nazwa = $nazwa;
    }

    public function getKodGrupy(){
        return $this->kodGrupy;
    }
    public function setKodGrupy($kodGrupy){
        $this->kodGrupy = $kodGrupy;
    }
}
