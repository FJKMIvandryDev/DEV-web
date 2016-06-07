<?php

namespace backBundle\DataTable;

use backBundle\Entity\Info;

class InfoFactory
{
    private $id;

    private $texte;

    private $titre;

    private $date;
 
    private $type;
    
    
    public function __construct(Info $info)
    {
        $this->setId($info->getId());
        $this->setTexte($info->getTexte());
        $this->setDate($info->getDate());
        $this->setTitre($info->getTitre());
        $this->setType($info->getType());
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = $id;
        
        return $this->id;
    }

    public function setTexte($texte)
    {
        $this->texte = $texte;

        return $this;
    }

    public function getTexte()
    {
        return $this->texte;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function setDate($date)
    {
        $this->date = $date->format('Y-m-d');

        return $this;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setType(\backBundle\Entity\Type_info $type)
    {
        $this->type = $type->getLibelle();

        return $this;
    }

    public function getType()
    {
        return $this->type;
    }
}
