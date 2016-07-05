<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backBundle\Services;

use Doctrine\ORM\EntityManager;
use \backBundle\Entity\Info;
use Symfony\Component\HttpFoundation\Request;
/**
 * Description of InfoService
 *
 * @author ptdr-Onja
 */
class InfoService {
    //put your code here
    protected $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }
    
    public function findAll()
    {
        $infos = $this->em->getRepository('backBundle:Info')->findAll();  
        
        return $infos;
    }
    
    public function findAllByType($type)
    {
        $article = $this->em->getRepository('backBundle:Info')->getAllByType($type);  
        
        return $article;
    }
    
    public function findById($id)
    {
        $info = $this->em->getRepository('backBundle:Info')->find($id);  
        
        return $info;
    }
    
    public function save(Request $request)
    { 

        $info = new Info();
        
        $info->setTexte($request->request->get("texte"));
        $info->setTitre($request->request->get("titre"));
        $info->setType($request->request->get("type"));
        $info->setDate(new \DateTime($request->request->get("date")));
        
        $this->em->persist($info);
        
        $this->em->flush();
    }
    
    public function update(Request $request)
    { 
        $info = $this->em->getRepository("backBundle:Info")->find($request->request->get("id"));
        
        $info->setTexte($request->request->get("texte"));
        $info->setTitre($request->request->get("titre"));
        $info->setType($request->request->get("type"));
        $info->setDate(new \DateTime($request->request->get("date")));
        
        $this->em->merge($info);
        $this->em->flush();
    }
    
    public function delete($id)
    {
        $info = $this->em->getRepository('backBundle:Info')->find($id);
        
        $this->em->remove($info);
        $this->em->flush();
    }
    
}
