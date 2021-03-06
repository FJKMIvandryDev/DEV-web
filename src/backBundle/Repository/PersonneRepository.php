<?php

namespace backBundle\Repository;

/**
 * PersonneRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PersonneRepository extends \Doctrine\ORM\EntityRepository
{
    public function findByName($param)
    {
        $em = $this->_em;
        
        $query = $em->createQuery(
            "SELECT pers
            FROM backBundle:Personne pers
            WHERE pers.nom like '%$param%' or pers.prenom like '%$param%'
            "
        );

        $article = $query->getResult();
        
        return $article;
    }
}
