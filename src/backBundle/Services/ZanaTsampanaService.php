<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use backBundle\Entity\ZanaTsampana;
use backBundle\Entity\MembreBureau;
use backBundle\Entity\SokajinAsa;

/**
 * Description of ZanaTsampanaService
 *
 * @author ptdr-Onja
 */
class ZanaTsampanaService {

    protected $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }
    
    public function findAll()
    {
        $zanaTsampana = $this->em->getRepository("backBundle:ZanaTsampana")->findAll();
        
        return $zanaTsampana;
    }
    
    public function findById($id)
    {
        return $zanaTsampana = $this->em->getRepository("backBundle:ZanaTsampana")->find($id);
    }
    
    public function save(Request $request)
    {
        $sokajy = new ZanaTsampana();
        
        $sokajy->setNom($request->request->get("nom"));
        $sokajy->setImageJacket($request->request->get("imageJacket"));
        $sokajy->setDescription($request->request->get("description"));
        $sokajy->setDateCreation(new \DateTime($request->request->get("dateCreation")));
        
        $sampana = $this->em->getRepository("backBundle:SokajinAsa")->find($request->request->get("reniny"));
        
        $sokajy->setSampana($sampana);
        
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
        $bureau->setZanaTsampana($sokajy);
        
        $this->em->persist($bureau);
        
        $this->em->flush();
    }
    
    public function update(Request $request)
    {
        
    }

    public function delete($id)
    {
       $zanaTsampana = $this->em->getRepository("backBundle:ZanaTsampana")->find($id);
        
       $this->em->remove($zanaTsampana);
       $this->em->flush();
    }
}
