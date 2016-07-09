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
        $personne = new Personne();
        
        $personne->setNom($request->request->get("nom"));
        $personne->setPrenom($request->request->get("prenom"));
        $personne->setPhoto($request->request->get("photo"));
        
        $this->em->persist($personne);
        $this->em->flush();
        
        return $personne;

    }
    
    public function delete($id)
    {
        $sokajy = $this->em->getRepository('backBundle:Personne')->find($id);
        
        $this->em->remove($sokajy);
        $this->em->flush();
    }
    
    public function update(Request $request)
    {
        $personne = new Personne();
        
        $personne->setId($request->request->get("id"));
        $personne->setNom($request->request->get("nom"));
        $personne->setPrenom($request->request->get("prenom"));
        $personne->setPhoto($request->request->get("photo"));
        
        $this->em->merge($personne);
        $this->em->flush();

    }
}
