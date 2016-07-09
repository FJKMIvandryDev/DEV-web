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
     * @ORM\ManyToOne(targetEntity="Personne", cascade={"persist"}, fetch="EAGER")
     * @ORM\JoinColumn(nullable=true)
    */
    private $filoha;

    /**
     * @ORM\ManyToOne(targetEntity="Personne", cascade={"persist"}, fetch="EAGER")
     * @ORM\JoinColumn(nullable=true)
    */
    private $filohaLefitra;

    /**
     * @ORM\ManyToOne(targetEntity="Personne", cascade={"persist"}, fetch="EAGER")
     * @ORM\JoinColumn(nullable=true)
    */
    private $mpitanTsoratra;

    /**
     * @ORM\ManyToOne(targetEntity="Personne", cascade={"persist"}, fetch="EAGER")
     * @ORM\JoinColumn(nullable=true)
    */
    private $mpitahiryVola;

    /**
     * @ORM\ManyToOne(targetEntity="Personne", cascade={"persist"}, fetch="EAGER")
     * @ORM\JoinColumn(nullable=true)
    */
    private $mpitanTsoratraVola;

    /**
     * @ORM\ManyToOne(targetEntity="Personne", cascade={"persist"}, fetch="EAGER")
     * @ORM\JoinColumn(nullable=true)
    */
    private $mpanoloTsaina;
    
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
     * @ORM\JoinColumn(nullable=false)
     */
    private $status;
    
    /**
     * @var int
     *
     * @ORM\Column(name="sokajinAsa_id", type="integer")
     */
    private $idSokajinAsa;
    
    /**
     * @ORM\ManyToOne(targetEntity="SokajinAsa", cascade={"persist"}, inversedBy="membreBureau")
     * @ORM\JoinColumn(name="sokajinAsa_id", referencedColumnName="id" , onDelete="CASCADE")
     * @ORM\JoinColumn(nullable=true)
    */
    private $sokajinAsa;
    
    /**
     * @var int
     *
     * @ORM\Column(name="zanaTsampana_id", type="integer")
     */
    private $idZanaTsampana;
    /**
     * @ORM\ManyToOne(targetEntity="ZanaTsampana", cascade={"persist"}, inversedBy="membreBureau")
     * @ORM\JoinColumn(name="zanaTsampana_id", referencedColumnName="id", onDelete="CASCADE")
     * @ORM\JoinColumn(nullable=true)
    */
    private $zanaTsampana;

    
    public function __construct()
    {
      $this->dateDebut = new \Datetime();
      $this->dateFin = new \Datetime();
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
    
    public function setId($id)
    {
        $this->id = $id;
        
        return $this;
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

    /**
     * Set filohaLefitra
     *
     * @param \backBundle\Entity\Personne $filohaLefitra
     *
     * @return MembreBureau
     */
    public function setFilohaLefitra(\backBundle\Entity\Personne $filohaLefitra = null)
    {
        $this->filohaLefitra = $filohaLefitra;

        return $this;
    }

    /**
     * Get filohaLefitra
     *
     * @return \backBundle\Entity\Personne
     */
    public function getFilohaLefitra()
    {
        return $this->filohaLefitra;
    }

    /**
     * Set mpitahiryVola
     *
     * @param \backBundle\Entity\Personne $mpitahiryVola
     *
     * @return MembreBureau
     */
    public function setMpitahiryVola(\backBundle\Entity\Personne $mpitahiryVola = null)
    {
        $this->mpitahiryVola = $mpitahiryVola;

        return $this;
    }

    /**
     * Get mpitahiryVola
     *
     * @return \backBundle\Entity\Personne
     */
    public function getMpitahiryVola()
    {
        return $this->mpitahiryVola;
    }

    /**
     * Set mpitanTsoratraVola
     *
     * @param \backBundle\Entity\Personne $mpitanTsoratraVola
     *
     * @return MembreBureau
     */
    public function setMpitanTsoratraVola(\backBundle\Entity\Personne $mpitanTsoratraVola = null)
    {
        $this->mpitanTsoratraVola = $mpitanTsoratraVola;

        return $this;
    }

    /**
     * Get mpitanTsoratraVola
     *
     * @return \backBundle\Entity\Personne
     */
    public function getMpitanTsoratraVola()
    {
        return $this->mpitanTsoratraVola;
    }

    /**
     * Set mpanoloTsaina
     *
     * @param \backBundle\Entity\Personne $mpanoloTsaina
     *
     * @return MembreBureau
     */
    public function setMpanoloTsaina(\backBundle\Entity\Personne $mpanoloTsaina = null)
    {
        $this->mpanoloTsaina = $mpanoloTsaina;

        return $this;
    }

    /**
     * Get mpanoloTsaina
     *
     * @return \backBundle\Entity\Personne
     */
    public function getMpanoloTsaina()
    {
        return $this->mpanoloTsaina;
    }

    /**
     * Set idSokajinAsa
     *
     * @param integer $idSokajinAsa
     *
     * @return MembreBureau
     */
    public function setIdSokajinAsa($idSokajinAsa)
    {
        $this->idSokajinAsa = $idSokajinAsa;

        return $this;
    }

    /**
     * Get idSokajinAsa
     *
     * @return integer
     */
    public function getIdSokajinAsa()
    {
        return $this->idSokajinAsa;
    }

    /**
     * Set idZanaTsampana
     *
     * @param integer $idZanaTsampana
     *
     * @return MembreBureau
     */
    public function setIdZanaTsampana($idZanaTsampana)
    {
        $this->idZanaTsampana = $idZanaTsampana;

        return $this;
    }

    /**
     * Get idZanaTsampana
     *
     * @return integer
     */
    public function getIdZanaTsampana()
    {
        return $this->idZanaTsampana;
    }
}
