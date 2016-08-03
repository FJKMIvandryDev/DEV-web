<?php

namespace backBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IsaSokajy
 *
 * @ORM\Table(name="isa_sokajy")
 * @ORM\Entity(repositoryClass="backBundle\Repository\IsaSokajyRepository")
 */
class IsaSokajy
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
     * @ORM\Column(name="isa", type="integer", nullable=false, options={"default":0})
     */
    private $isa;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;
    
    /**
     * @ORM\Column(name="zanaTsampana_id", type="integer", nullable=true)
     */
    private $zanaTsampanaId;
    
    /**
     * @ORM\Column(name="sokajinAsa_id", type="integer", nullable=true)
     */
    private $sokajinAsaId;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer", nullable=false, options={"default":1})
     */
    private $status;

    
    public function __construct()
    {
      $this->date = new \Datetime();
    }
    
    
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
     * @return IsaSokajy
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

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return IsaSokajy
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set zanaTsampanaId
     *
     * @param integer $zanaTsampanaId
     *
     * @return IsaSokajy
     */
    public function setZanaTsampanaId($zanaTsampanaId)
    {
        $this->zanaTsampanaId = $zanaTsampanaId;

        return $this;
    }

    /**
     * Get zanaTsampanaId
     *
     * @return integer
     */
    public function getZanaTsampanaId()
    {
        return $this->zanaTsampanaId;
    }

    /**
     * Set sokajinAsaId
     *
     * @param integer $sokajinAsaId
     *
     * @return IsaSokajy
     */
    public function setSokajinAsaId($sokajinAsaId)
    {
        $this->sokajinAsaId = $sokajinAsaId;

        return $this;
    }

    /**
     * Get sokajinAsaId
     *
     * @return integer
     */
    public function getSokajinAsaId()
    {
        return $this->sokajinAsaId;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return IsaSokajy
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }
}
