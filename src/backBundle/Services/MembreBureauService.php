<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backBundle\Services;

use Doctrine\ORM\EntityManager;
use backBundle\Entity\MembreBureau;
/**
 * Description of MembreBureauService
 *
 * @author ptdr-Onja
 */
class MembreBureauService {
    
    protected $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }
    
    public function findBySokajinAsaActif($idSokajinAsa)
    {
        $sokajyRepo = $this->em->getRepository('backBundle:MembreBureau');
        
        return $sokajyRepo->findBySokajinAsa($idSokajinAsa);
    }
    
    public function findByZanaTsampanaActif($idZanaTsampana)
    {
        
    }
}
