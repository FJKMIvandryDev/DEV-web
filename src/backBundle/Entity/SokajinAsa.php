<?php

namespace backBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * SokajinAsa
 *
 * @ORM\Table(name="sokajin_asa")
 * @ORM\Entity(repositoryClass="backBundle\Repository\SokajinAsaRepository")
 */
class SokajinAsa
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
     * @ORM\Column(name="nom", type="string", length=255)
     * @ORM\JoinColumn(nullable=false)
     */
    private $nom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="date")
     * @ORM\JoinColumn(nullable=true)
     */
    private $dateCreation;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     * @ORM\JoinColumn(nullable=true)
     */
    private $description;
    
    /**
     * @ORM\Column(name="type", type="string", length=100)
     */
    private $type;

    /**
     * @ORM\Column(name="imageJacket", type="string", length=500)
     */
    private $imageJacket;
    
    /**
     * @ORM\ManyToMany(targetEntity="Article", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
    */
    private $articles;
 
    /**
     * @ORM\ManyToMany(targetEntity="Image", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
    */
    private $images;
    
    /**
     * @ORM\ManyToMany(targetEntity="Video", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
    */
    private $videos;
    
    /**
     * @ORM\OneToMany(targetEntity="ZanaTsampana", cascade={"persist"}, mappedBy="sokajinAsa")
     * @ORM\JoinColumn(nullable=true)
    */
    private $zanaTsampana;
    
    /**
     * @ORM\OneToMany(targetEntity="MembreBureau", cascade={"persist"}, mappedBy="sokajinAsa")
     * @ORM\JoinColumn(nullable=false)
    */
    private $membreBureau;


    public function __construct()
    {
      $this->articles = new ArrayCollection();
      $this->images = new ArrayCollection();
      $this->videos = new ArrayCollection();
      $this->zanaTsampana = new ArrayCollection();
        
      $this->dateCreation = new \Datetime();
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
     * Set nom
     *
     * @param string $nom
     *
     * @return SokajinAsa
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return SokajinAsa
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return SokajinAsa
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set type
     *
     *
     * @return SokajinAsa
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Add article
     *
     * @param \backBundle\Entity\Article $article
     *
     * @return SokajinAsa
     */
    public function addArticle(\backBundle\Entity\Article $article)
    {
        $this->articles[] = $article;

        return $this;
    }

    /**
     * Remove article
     *
     * @param \backBundle\Entity\Article $article
     */
    public function removeArticle(\backBundle\Entity\Article $article)
    {
        $this->articles->removeElement($article);
    }

    /**
     * Get articles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * Add image
     *
     * @param \backBundle\Entity\Image $image
     *
     * @return SokajinAsa
     */
    public function addImage(\backBundle\Entity\Image $image)
    {
        $this->images[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param \backBundle\Entity\Image $image
     */
    public function removeImage(\backBundle\Entity\Image $image)
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
     * Add video
     *
     * @param \backBundle\Entity\Video $video
     *
     * @return SokajinAsa
     */
    public function addVideo(\backBundle\Entity\Video $video)
    {
        $this->videos[] = $video;

        return $this;
    }

    /**
     * Remove video
     *
     * @param \backBundle\Entity\Video $video
     */
    public function removeVideo(\backBundle\Entity\Video $video)
    {
        $this->videos->removeElement($video);
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

    /**
     * Add zanaTsampana
     *
     * @param \backBundle\Entity\ZanaTsampana $zanaTsampana
     *
     * @return SokajinAsa
     */
    public function addZanaTsampana(\backBundle\Entity\ZanaTsampana $zanaTsampana)
    {
        $this->zanaTsampana[] = $zanaTsampana;

        return $this;
    }

    /**
     * Remove zanaTsampana
     *
     * @param \backBundle\Entity\ZanaTsampana $zanaTsampana
     */
    public function removeZanaTsampana(\backBundle\Entity\ZanaTsampana $zanaTsampana)
    {
        $this->zanaTsampana->removeElement($zanaTsampana);
    }

    /**
     * Get zanaTsampana
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getZanaTsampana()
    {
        return $this->zanaTsampana;
    }

    /**
     * Add membreBureau
     *
     * @param \backBundle\Entity\MembreBureau $membreBureau
     *
     * @return SokajinAsa
     */
    public function addMembreBureau(\backBundle\Entity\MembreBureau $membreBureau)
    {
        $this->membreBureau[] = $membreBureau;

        return $this;
    }

    /**
     * Remove membreBureau
     *
     * @param \backBundle\Entity\MembreBureau $membreBureau
     */
    public function removeMembreBureau(\backBundle\Entity\MembreBureau $membreBureau)
    {
        $this->membreBureau->removeElement($membreBureau);
    }

    /**
     * Get membreBureau
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMembreBureau()
    {
        return $this->membreBureau;
    }

    /**
     * Set imageJacket
     *
     *
     * @return SokajinAsa
     */
    public function setImageJacket($imageJacket)
    {
        $this->imageJacket = $imageJacket;

        return $this;
    }

    /**
     * Get imageJacket
     *
     */
    public function getImageJacket()
    {
        return $this->imageJacket;
    }

    /**
     * Set typeId
     *
     * @param integer $typeId
     *
     * @return SokajinAsa
     */
    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;

        return $this;
    }

    /**
     * Get typeId
     *
     * @return integer
     */
    public function getTypeId()
    {
        return $this->typeId;
    }
}
