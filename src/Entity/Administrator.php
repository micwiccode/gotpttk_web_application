<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AdministratorRepository")
 */
class Administrator
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idA;

    /**
     * @ORM\Column(type="text", length=30)
     */
    private $imie;

    /**
     * @ORM\Column(type="text", length=30)
     */
    private $nazwisko;

    /**
     * @ORM\Column(type="text", length=16)
     */
    private $login;

    /**
     * @ORM\Column(type="text", length=16)
     */
    private $haslo;



    //Getters & Setters
    public function getIdA(): ?int
    {
        return $this->idA;
    }
    
    public function getImie(){
        return $this->imie;
    }
    public function setImie($imie){
        $this->imie = $imie;
    }

    public function getNazwisko(){
        return $this->nazwisko;
    }
    public function setNazwisko($nazwisko){
        $this->nazwisko = $nazwisko;
    }

    public function getLogin(){
        return $this->login;
    }
    public function setLogin($login){
        $this->login = $login;
    }

    public function getHaslo(){
        return $this->haslo;
    }
    public function setHaslo($haslo){
        $this->haslo = $haslo;
    }
}
