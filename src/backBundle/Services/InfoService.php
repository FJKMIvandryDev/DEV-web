<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backBundle\Services;

use Doctrine\ORM\EntityManager;
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
    
    public function saveOrUpdate($info)
    { 
        $this->em->persist($info);
        $this->em->flush();
    }
    
    public function delete($id)
    {
        $info = $this->em->getRepository('backBundle:Info')->find($id);
        
        $this->em->remove($info);
        $this->em->flush();
    }
    
}
