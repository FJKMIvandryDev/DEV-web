<?php

namespace backBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use backBundle\Entity\Personne;

/**
 * Description of PersonneService
 *
 * @author ptdr-Onja
 */
class PersonneService {
    
    protected $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }
    
    
    public function findAll()
    {
        $list = $this->em->getRepository('backBundle:Personne')->findAll();
        
        return $list;
    }
    
    public function findById($id)
    {
        $personne = $this->em->getRepository('backBundle:Personne')->find($id);  
        
        return $personne;
    }
    
    public function findByName($name)
    {
        $personnes = $this->em->getRepository('backBundle:Personne')->findByName($name);
        
        return $personnes;
    }
    
    public function save(Request $request)
    { 
//        $sokajy = new SokajinAsa();
//        
//        $sokajy->setNom($request->request->get("nom"));
//        $sokajy->setImageJacket($request->request->get("imageJacket"));
//        $sokajy->setType($request->request->get("type"));
//        $sokajy->setDescription($request->request->get("description"));
//        $sokajy->setDateCreation(new \DateTime($request->request->get("dateCreation")));
//        
//        $this->em->persist($sokajy);
//        $this->em->flush();
    }
    
    public function delete($id)
    {
//        $sokajy = $this->em->getRepository('backBundle:Personne')->find($id);
//        
//        $this->em->remove($sokajy);
//        $this->em->flush();
    }
    
    public function update(Request $request)
    {
//        $sokajy = new SokajinAsa();
//        
//        $sokajy->setId($request->request->get("id"));
//        $sokajy->setNom($request->request->get("nom"));
//        $sokajy->setImageJacket($request->request->get("imageJacket"));
//        $sokajy->setType($request->request->get("type"));
//        $sokajy->setDescription($request->request->get("description"));
//        $sokajy->setDateCreation(new \DateTime($request->request->get("dateCreation")));
//        
//        $this->em->merge($sokajy);
//        $this->em->flush();
    }
}
