<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MountainGroupRepository")
 */
class MountainGroup
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="idG")
     */
    private $idG;

    /**
     * @ORM\Column(type="text", length=30)
     */
    private $name;

    /**
     * @ORM\Column(type="text", length=5, name="groupCode")
     */
    private $groupCode;

    //Getters & Setters
    public function getIdG(){
        return $this->idG;
    }

    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }

    public function getGroupCode(){
        return $this->groupCode;
    }
    public function setGroupCode($groupCode){
        $this->groupCode = $groupCode;
    }
}
