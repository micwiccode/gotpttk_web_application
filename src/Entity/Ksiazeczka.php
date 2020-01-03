<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\KsiazeczkaRepository")
 */
class Ksiazeczka
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idK;

    /**
     * @ORM\Column(type="integer", precision=4)
     */
    private $liczbaPunktow;



    //Getters & Setters
    public function getIdK(): ?int
    {
        return $this->idK;
    }

    public function getLiczbaPunktow(){
        return $this->liczbaPunktow;
    }
    public function setLiczbaPunktow($liczbaPunktow){
        $this->liczbaPunktow = $liczbaPunktow;
    }
}
