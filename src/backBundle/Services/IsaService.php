<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
/**
 * Description of IsaService
 *
 * @author ptdr-Onja
 */
class IsaService {
    
    protected $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }
    
    public function findIsaSokajy($idSokajy)
    {
        $isa = $this->em->getRepository('backBundle:IsaSokajy')->findIsaSokajy($idSokajy);  
        
        return $isa;
    }
    
    public function findIsaZanany($idZanany)
    {
        $isa = $this->em->getRepository('backBundle:IsaSokajy')->findIsaZanany($idZanany);  
        
        return $isa;
    }
}
