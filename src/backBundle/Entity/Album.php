<?php

namespace backBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Album
 *
 * @ORM\Table(name="album")
 * @ORM\Entity(repositoryClass="backBundle\Repository\AlbumRepository")
 */
class Album
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;
    
    /**
     * @var string
     *
     * @ORM\Column(name="jacket", type="string", length=500, nullable=true)
     */
    private $jacket;
    
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(name="sokajinAsa_id", type="integer", nullable=true)
     */
    private $sokajinAsaId;
    
    /**
     * @ORM\ManyToOne(targetEntity="SokajinAsa", cascade={"persist"}, inversedBy="articles")
     * @ORM\JoinColumn(name="sokajinAsa_id", referencedColumnName="id")
     * @ORM\JoinColumn(nullable=true)
    */
    private $sokajinAsa;
    
    /**
     * @ORM\Column(name="zanaTsampana_id", type="integer", nullable=true)
     */
    private $zanaTsampanaId;
    
    /**
     * @ORM\ManyToOne(targetEntity="ZanaTsampana", cascade={"persist"}, inversedBy="articles")
     * @ORM\JoinColumn(name="zanaTsampana_id", referencedColumnName="id")
     * @ORM\JoinColumn(nullable=true)
    */
    private $zanaTsampana;

    /**
     * @ORM\OneToMany(targetEntity="ImageAlbum", cascade={"persist"}, mappedBy="album")
     * @ORM\JoinColumn(nullable=true)
    */
    private $images;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
        $this->date = new \Datetime();
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        
        return $this;
    }
    
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * Set name
     *
     * @param string $name
     *
     * @return Album
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Article
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
     * Set sokajinAsaId
     *
     * @param integer $sokajinAsaId
     *
     * @return Album
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
     * Set zanaTsampanaId
     *
     * @param integer $zanaTsampanaId
     *
     * @return Album
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
     * Set sokajinAsa
     *
     * @param \backBundle\Entity\SokajinAsa $sokajinAsa
     *
     * @return Album
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
     * @return Album
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
     * Add image
     *
     * @param \backBundle\Entity\ImageAlbum $image
     *
     * @return Album
     */
    public function addImage(\backBundle\Entity\ImageAlbum $image)
    {
        $this->images[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param \backBundle\Entity\ImageAlbum $image
     */
    public function removeImage(\backBundle\Entity\ImageAlbum $image)
    {
        $this->images->removeElement($image);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set jacket
     *
     * @param string $jacket
     *
     * @return Album
     */
    public function setJacket($jacket)
    {
        $this->jacket = $jacket;

        return $this;
    }

    /**
     * Get jacket
     *
     * @return string
     */
    public function getJacket()
    {
        return $this->jacket;
    }
}
