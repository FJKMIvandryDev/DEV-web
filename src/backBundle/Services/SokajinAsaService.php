<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use backBundle\Entity\SokajinAsa;

/**
 * Description of SokajinAsaService
 *
 * @author ptdr-Onja
 */
class SokajinAsaService {
    
    protected $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }
    
    public function findAll($type)
    {
        $list = $this->em->getRepository('backBundle:SokajinAsa')->getAllByType($type);
        
        return $list;
    }
    
    public function save(Request $request)
    { 
        $sokajy = new SokajinAsa();
        
        $sokajy->setNom($request->request->get("nom"));
        $sokajy->setImageJacket($request->request->get("imageJacket"));
        $sokajy->setType($request->request->get("type"));
        $sokajy->setDescription($request->request->get("description"));
        $sokajy->setDateCreation(new \DateTime($request->request->get("dateCreation")));
        
        $this->em->persist($sokajy);
        $this->em->flush();
    }
    
     public function delete($id)
    {
        $sokajy = $this->em->getRepository('backBundle:SokajinAsa')->find($id);
        
        $this->em->remove($sokajy);
        $this->em->flush();
    }
}
