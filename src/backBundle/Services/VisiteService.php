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
 * Description of VisiteService
 *
 * @author ptdr-Onja
 */
class VisiteService {
    
    protected $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }
    
    public function findAll()
    {
        $visites = $this->em->getRepository('backBundle:Visite')->findAll();
        
        if (sizeof($visites)>0)
        {
            return $visites[0];
        }
        
        $visite = new \backBundle\Entity\Visite();
        $visite->setIsa(0);
        
        return $visite;
    }
    
    public function addVisite()
    {
        $visiteRepo = $this->em->getRepository('backBundle:Visite');
        
        $visites = $visiteRepo->findAll();
        
        if (sizeof($visites)<=0)
        {
            $visite = new \backBundle\Entity\Visite();
            $visite->setIsa(1);
            
            $this->em->persist($visite);
            $this->em->flush();
        }
        else
        {
            $this->em->getRepository('backBundle:Visite')->addVisite();
        }
        
    }
}
