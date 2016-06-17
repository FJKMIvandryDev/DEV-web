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
use backBundle\Entity\MembreBureau;

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
    
    public function findById($id)
    {
        $sokajy = $this->em->getRepository('backBundle:SokajinAsa')->find($id);  
        
        return $sokajy;
    }
    
    public function save(Request $request)
    { 
        $sokajy = new SokajinAsa();
        
        $sokajy->setNom($request->request->get("nom"));
        $sokajy->setImageJacket($request->request->get("imageJacket"));
        $sokajy->setType($request->request->get("type"));
        $sokajy->setDescription($request->request->get("description"));
        $sokajy->setDateCreation(new \DateTime($request->request->get("dateCreation")));
        
        $emBureau = $this->em->getRepository('backBundle:Personne');
 
        $this->em->persist($sokajy);
        
        
        $bureau = new MembreBureau();
        
        $bureau->setFiloha($emBureau->find($request->request->get("filoha")));
        $bureau->setFilohaLefitra($emBureau->find($request->request->get("filoha_lefitra")));
        $bureau->setMpitanTsoratra($emBureau->find($request->request->get("mpitan_tsoratra")));
        $bureau->setMpitahiryVola($emBureau->find($request->request->get("mpitahiry_vola")));
        $bureau->setMpitanTsoratraVola($emBureau->find($request->request->get("mpitantsoratra_vola")));
        $bureau->setMpanoloTsaina($emBureau->find($request->request->get("mpanolo_tsaina")));
        $bureau->setStatus(1);
        $bureau->setSokajinAsa($sokajy);
        
        $this->em->persist($bureau);
        
        $this->em->flush();
    }
    
    public function delete($id)
    {
        $sokajy = $this->em->getRepository('backBundle:SokajinAsa')->find($id);
        
        $this->em->remove($sokajy);
        $this->em->flush();
    }
    
    public function update(Request $request)
    {
        $sokajy = new SokajinAsa();
        
        $sokajy->setId($request->request->get("id"));
        $sokajy->setNom($request->request->get("nom"));
        $sokajy->setImageJacket($request->request->get("imageJacket"));
        $sokajy->setType($request->request->get("type"));
        $sokajy->setDescription($request->request->get("description"));
        $sokajy->setDateCreation(new \DateTime($request->request->get("dateCreation")));
        
        $this->em->merge($sokajy);
        $this->em->flush();
    }
}
