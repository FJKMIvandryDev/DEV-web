<?php

namespace backBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * ZanaTsampana
 *
 * @ORM\Table(name="zana_tsampana")
 * @ORM\Entity(repositoryClass="backBundle\Repository\ZanaTsampanaRepository")
 */
class ZanaTsampana
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
     * @var string
     *
     * @ORM\Column(name="imdageJacket", type="string", length=500)
     * @ORM\JoinColumn(nullable=true)
     */
    private $imageJacket;

    /**
     * @ORM\Column(name="sokajinAsa_id", type="integer")
     */
    private $sampanaId;
    
    /**
     * @ORM\ManyToOne(targetEntity="SokajinAsa", inversedBy="zanaTsampana")
     * @ORM\JoinColumn(name="sokajinAsa_id", referencedColumnName="id")
     * @ORM\JoinColumn(nullable=false)
    */
    private $sampana;
    
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
     * @ORM\OneToMany(targetEntity="MembreBureau", cascade={"persist"}, mappedBy="zanaTsampana")
     * @ORM\JoinColumn(nullable=false)
    */
    private $membreBureau;
    
    
    public function __construct()
    {
      $this->articles = new ArrayCollection();
      $this->images = new ArrayCollection();
      $this->videos = new ArrayCollection();
        
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
    
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return ZanaTsampana
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
     * @return ZanaTsampana
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
     * @return ZanaTsampana
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
     * Add article
     *
     * @param \backBundle\Entity\Article $article
     *
     * @return ZanaTsampana
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
     * @return ZanaTsampana
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
     * @return ZanaTsampana
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
     * Add membreBureau
     *
     * @param \backBundle\Entity\MembreBureau $membreBureau
     *
     * @return ZanaTsampana
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
     * @param \backBundle\Entity\Image $imageJacket
     *
     * @return ZanaTsampana
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

    /**
     * Set sampanaId
     *
     * @param integer $sampanaId
     *
     * @return ZanaTsampana
     */
    public function setSampanaId($sampanaId)
    {
        $this->sampanaId = $sampanaId;

        return $this;
    }

    /**
     * Get sampanaId
     *
     * @return integer
     */
    public function getSampanaId()
    {
        return $this->sampanaId;
    }

    /**
     * Set sampana
     *
     * @param \backBundle\Entity\SokajinAsa $sampana
     *
     * @return ZanaTsampana
     */
    public function setSampana(\backBundle\Entity\SokajinAsa $sampana = null)
    {
        $this->sampana = $sampana;

        return $this;
    }

    /**
     * Get sampana
     *
     * @return \backBundle\Entity\SokajinAsa
     */
    public function getSampana()
    {
        return $this->sampana;
    }
}
