<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backBundle\Services;

use backBundle\Entity\Type_info;
use Doctrine\ORM\EntityManager;
/**
 * Description of TypeInfoService
 *
 * @author ptdr-Onja
 */
class TypeInfoService {
    
    protected $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }
    
     public function find($id)
    {
        return $this->em->getRepository('backBundle:Type_info')->find($id);  
    }
    
    public function findAll()
    {
        $types = $this->em->getRepository('backBundle:Type_info')->findAll();  
        
        return $types;
    }
    
    public function save($sLibelle)
    { 
        $tmp = new Type_info();
        
        $tmp->setLibelle($sLibelle);
        
        $this->em->persist($tmp);
        $this->em->flush();
    }
}
