<?php

namespace backBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Visite
 *
 * @ORM\Table(name="visite")
 * @ORM\Entity(repositoryClass="backBundle\Repository\VisiteRepository")
 */
class Visite
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="isa", type="integer", options={"default":0})
     */
    private $isa;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set isa
     *
     * @param integer $isa
     *
     * @return Visite
     */
    public function setIsa($isa)
    {
        $this->isa = $isa;

        return $this;
    }

    /**
     * Get isa
     *
     * @return int
     */
    public function getIsa()
    {
        return $this->isa;
    }
}

