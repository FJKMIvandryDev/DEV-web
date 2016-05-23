<?php

namespace backBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MembreBureau
 *
 * @ORM\Table(name="membre_bureau")
 * @ORM\Entity(repositoryClass="backBundle\Repository\MembreBureauRepository")
 */
class MembreBureau
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
     * @ORM\OneToOne(targetEntity="Personne", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
    */
    private $filoha;
    
    /**
     * @ORM\OneToOne(targetEntity="Personne", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
    */
    private $filohaMpanampy;
    
    /**
     * @ORM\OneToOne(targetEntity="Personne", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
    */
    private $mpitanTsoratra;
    
    /**
     * @ORM\OneToOne(targetEntity="Personne", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
    */
    private $mpitamBola;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebut", type="date")
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFin", type="date")
     * @ORM\JoinColumn(nullable=false)
     */
    private $dateFin;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="SokajinAsa", cascade={"persist"}, inversedBy="membreBureau")
     * @ORM\JoinColumn(name="sokajinAsa_id", referencedColumnName="id")
     * @ORM\JoinColumn(nullable=false)
    */
    private $sokajinAsa;
    
    /**
     * @ORM\ManyToOne(targetEntity="ZanaTsampana", cascade={"persist"}, inversedBy="membreBureau")
     * @ORM\JoinColumn(name="zanaTsampana_id", referencedColumnName="id")
     * @ORM\JoinColumn(nullable=false)
    */
    private $zanaTsampana;

    public function __construct()
    {
      $this->dateDebut = new \Datetime();
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
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return MembreBureau
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return MembreBureau
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return MembreBureau
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set filoha
     *
     * @param \backBundle\Entity\Personne $filoha
     *
     * @return MembreBureau
     */
    public function setFiloha(\backBundle\Entity\Personne $filoha)
    {
        $this->filoha = $filoha;

        return $this;
    }

    /**
     * Get filoha
     *
     * @return \backBundle\Entity\Personne
     */
    public function getFiloha()
    {
        return $this->filoha;
    }

    /**
     * Set filohaMpanampy
     *
     * @param \backBundle\Entity\Personne $filohaMpanampy
     *
     * @return MembreBureau
     */
    public function setFilohaMpanampy(\backBundle\Entity\Personne $filohaMpanampy)
    {
        $this->filohaMpanampy = $filohaMpanampy;

        return $this;
    }

    /**
     * Get filohaMpanampy
     *
     * @return \backBundle\Entity\Personne
     */
    public function getFilohaMpanampy()
    {
        return $this->filohaMpanampy;
    }

    /**
     * Set mpitanTsoratra
     *
     * @param \backBundle\Entity\Personne $mpitanTsoratra
     *
     * @return MembreBureau
     */
    public function setMpitanTsoratra(\backBundle\Entity\Personne $mpitanTsoratra)
    {
        $this->mpitanTsoratra = $mpitanTsoratra;

        return $this;
    }

    /**
     * Get mpitanTsoratra
     *
     * @return \backBundle\Entity\Personne
     */
    public function getMpitanTsoratra()
    {
        return $this->mpitanTsoratra;
    }

    /**
     * Set mpitamBola
     *
     * @param \backBundle\Entity\Personne $mpitamBola
     *
     * @return MembreBureau
     */
    public function setMpitamBola(\backBundle\Entity\Personne $mpitamBola)
    {
        $this->mpitamBola = $mpitamBola;

        return $this;
    }

    /**
     * Get mpitamBola
     *
     * @return \backBundle\Entity\Personne
     */
    public function getMpitamBola()
    {
        return $this->mpitamBola;
    }

    /**
     * Set sokajinAsa
     *
     * @param \backBundle\Entity\SokajinAsa $sokajinAsa
     *
     * @return MembreBureau
     */
    public function setSokajinAsa(\backBundle\Entity\SokajinAsa $sokajinAsa = null)
    {
        $this->sokajinAsa = $sokajinAsa;

        return $this;
    }

    /**
     * Get sokajinAsa
     *
     * @return \backBundle\Entity\SokajinAsa
     */
    public function getSokajinAsa()
    {
        return $this->sokajinAsa;
    }

    /**
     * Set zanaTsampana
     *
     * @param \backBundle\Entity\ZanaTsampana $zanaTsampana
     *
     * @return MembreBureau
     */
    public function setZanaTsampana(\backBundle\Entity\ZanaTsampana $zanaTsampana = null)
    {
        $this->zanaTsampana = $zanaTsampana;

        return $this;
    }

    /**
     * Get zanaTsampana
     *
     * @return \backBundle\Entity\ZanaTsampana
     */
    public function getZanaTsampana()
    {
        return $this->zanaTsampana;
    }
}
