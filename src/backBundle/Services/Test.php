<?php

namespace backBundle\Services;

use Doctrine\ORM\EntityManager;

/**
 * Description of test
 *
 * @author ptdr-Onja
 */
class Test {
    
    protected $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }
    
    public function test()
    {
        $personnes = $this->em->getRepository('backBundle:Info')->findAll();
        
        
        return $personnes[0]->getTypeId();
    }
    
}
