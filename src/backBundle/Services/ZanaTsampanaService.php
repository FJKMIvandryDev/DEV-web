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
        
        $this->em->persist($sokajy);
        
        
        $emBureau = $this->em->getRepository('backBundle:Personne');

        $bureau = new MembreBureau();
        
        $idFiloha = $request->request->get("filoha");
        $idFilohaLefitra = $request->request->get("filoha_lefitra");
        $idMpitanTsoratra = $request->request->get("mpitan_tsoratra");
        $idMpitahiryVola = $request->request->get("mpitahiry_vola");
        $idMpitanTsoratraVola = $request->request->get("mpitantsoratra_vola");
        $idMpanolonTsaina = $request->request->get("mpanolo_tsaina");
        
        if ($idFiloha != 0)
        {
           $bureau->setFiloha($emBureau->find($idFiloha)); 
        }
        if ($idFilohaLefitra != 0)
        {
            $bureau->setFilohaLefitra($emBureau->find($idFilohaLefitra));
        }
        if ($idMpitanTsoratra != 0)
        {
            $bureau->setMpitanTsoratra($emBureau->find($idMpitanTsoratra));
        }
        if ($idMpitahiryVola != 0)
        {
            $bureau->setMpitahiryVola($emBureau->find($idMpitahiryVola));
        }
        if ($idMpitanTsoratraVola != 0)
        {
            $bureau->setMpitanTsoratraVola($emBureau->find($idMpitanTsoratraVola));
        }
        if ($idMpanolonTsaina != 0)
        {
            $bureau->setMpanoloTsaina($emBureau->find($idMpanolonTsaina));
        }
        
        $bureau->setStatus(1);
        $bureau->setZanaTsampana($sokajy);
        
        $this->em->persist($bureau);
        
        $this->em->flush();
    }
    
    public function update(Request $request)
    {
        $sokajy = new ZanaTsampana();
        
        $sokajy->setId($request->request->get("id"));
        $sokajy->setNom($request->request->get("nom"));
        $sokajy->setImageJacket($request->request->get("imageJacket"));
        $sokajy->setDescription($request->request->get("description"));
        $sokajy->setDateCreation(new \DateTime($request->request->get("dateCreation")));
        
        
        
        $sampana = $this->em->getRepository("backBundle:SokajinAsa")->find($request->request->get("reniny"));
        
//        var_dump($sampana);
//        die;
        
        $sokajy->setSampana($sampana);
 
        $this->em->merge($sokajy);
        $this->em->flush();
    }

    public function delete($id)
    {
       $zanaTsampana = $this->em->getRepository("backBundle:ZanaTsampana")->find($id);
        
       $this->em->remove($zanaTsampana);
       $this->em->flush();
    }
}
