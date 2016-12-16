<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use \backBundle\Entity\Album;

/**
 * Description of AlbumService
 *
 * @author ptdr-Onja
 */
class AlbumService {
    
    protected $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }
    
    public function findAll()
    {
        $album = $this->em->getRepository('backBundle:Album')->findAll();  
        
        return $album;
    }
    
    public function findById($id)
    {
        $album = $this->em->getRepository('backBundle:Album')->find($id);  
        
        return $album;
    }
    
    public function save(Request $request)
    {
        $album = new Album();
        $album->setName($request->request->get("name"));
        $album->setJacket($request->request->get("jacket"));
        $album->setDescription($request->request->get("description"));
        $album->setDate(new \DateTime($request->request->get("date")));
        
        $sokajyEM = $this->em->getRepository('backBundle:SokajinAsa');
        $zananyEM = $this->em->getRepository('backBundle:ZanaTsampana');
        
        $Sokajy = $sokajyEM->find($request->request->get("sokajy"));
        $Zanany = $zananyEM->find($request->request->get("zanaTsampana"));
        
        if ($Sokajy != '0')
        {
            $album->setSokajinAsa($Sokajy);
        }
        if ($Zanany != '0')
        {
            $album->setZanaTsampana($Zanany);
        }
        
        $this->em->persist($album);
        $this->em->flush();
    }
    
    public function update(Request $request)
    {
        $album = $this->em->getRepository("backBundle:Album")->find($request->request->get("id"));
        $album->setName($request->request->get("name"));
        $album->setJacket($request->request->get("jacket"));
        $album->setDescription($request->request->get("description"));
        $album->setDate(new \DateTime($request->request->get("date")));
        
        $sokajyEM = $this->em->getRepository('backBundle:SokajinAsa');
        $zananyEM = $this->em->getRepository('backBundle:ZanaTsampana');
        
        $Sokajy = $sokajyEM->find($request->request->get("sokajy"));
        $Zanany = $zananyEM->find($request->request->get("zanaTsampana"));
        
        if ($Sokajy != '0')
        {
            $album->setSokajinAsa($Sokajy);
        }
        if ($Zanany != '0')
        {
            $album->setZanaTsampana($Zanany);
        }
        
        $this->em->merge($album);
        $this->em->flush();
    }
    
    public function delete($id)
    {
        $album = $this->em->getRepository("backBundle:Album")->find($id);
        
        $this->em->remove($album);
        $this->em->flush();
    }
    
    public function getImages($id)
    {
        $images = $this->em->getRepository('backBundle:ImageAlbum')->findByAlbum($id);
        
        return $images;
    }
}
