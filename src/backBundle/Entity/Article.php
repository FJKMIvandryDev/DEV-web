<?php

namespace backBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="backBundle\Repository\ArticleRepository")
 */
class Article
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
     * @ORM\Column(name="titre", type="string", length=100)
     */
    private $titre;
    
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="auteur", type="string", length=100)
     * @ORM\JoinColumn(nullable=true)
     */
    private $auteur;
    
    /**
     * @var string
     *
     * @ORM\Column(name="imageJacket", type="string", length=500, nullable=true)
     */
    private $imageJacket;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=100)
     * @ORM\JoinColumn(nullable=true)
     */
    private $type;
    
    /**
     * @ORM\OneToOne(targetEntity="Texte", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
    */
    private $texte;
    
    /**
     * @var string
     *
     * @ORM\Column(name="video", type="string", length=500, nullable=true)
     */
    private $videos;
    
    /**
     * @var string
     *
     * @ORM\Column(name="audio", type="string", length=500, nullable=true)
     */
    private $audios;
    
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
    
    
    public function __construct()
    {
      $this->date = new \Datetime();
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
    
    public function setId($id)
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Article
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
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
     * Set auteur
     *
     * @param string $auteur
     *
     * @return Article
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return string
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set texte
     *
     * @param \backBundle\Entity\Texte $texte
     *
     * @return Article
     */
    public function setTexte(\backBundle\Entity\Texte $texte)
    {
        $this->texte = $texte;

        return $this;
    }

    /**
     * Get texte
     *
     * @return \backBundle\Entity\Texte
     */
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * Set imageJacket
     *
     *
     * @return Article
     */
    public function setImageJacket($imageJacket)
    {
        $this->imageJacket = $imageJacket;

        return $this;
    }

    /**
     * Get imageJacket
     *
     * @return \backBundle\Entity\Image
     */
    public function getImageJacket()
    {
        return $this->imageJacket;
    }

    public function setVideos($video)
    {
        $this->videos = $video;
        
        return $this;
    }
    /**
     * Get videos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVideos()
    {
        return $this->videos;
    }

    public function setAudios($audio)
    {
        $this->audios = $audio;
        
        return $this;
    }
    /**
     * Get audios
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAudios()
    {
        return $this->audios;
    }

    /**
     * Set type
     *
     * @param \backBundle\Entity\Type_Article $type
     *
     * @return Article
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \backBundle\Entity\Type_Article
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set sokajinAsa
     *
     * @param \backBundle\Entity\SokajinAsa $sokajinAsa
     *
     * @return Article
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
     * @return Article
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
     * Set sokajinAsaId
     *
     * @param integer $sokajinAsaId
     *
     * @return Article
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
     * @return Article
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
}
