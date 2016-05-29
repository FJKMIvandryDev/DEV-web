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
     * @ORM\OneToOne(targetEntity="Texte", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
    */
    private $texte;
    
    /**
     * @ORM\OneToOne(targetEntity="Image", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
    */
    private $imageJacket;

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
     * @ORM\ManyToMany(targetEntity="Audio", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
    */
    private $audios;
    
    /**
     * @ORM\ManyToOne(targetEntity="Type_Article", cascade={"persist"})
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id")
     * @ORM\JoinColumn(nullable=false)
    */
    private $type;
    
    /**
     * @ORM\ManyToMany(targetEntity="Categorie", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
    */
    private $categorie;
    
    /**
     * @ORM\ManyToOne(targetEntity="SokajinAsa", cascade={"persist"}, inversedBy="articles")
     * @ORM\JoinColumn(name="sokajinAsa_id", referencedColumnName="id")
     * @ORM\JoinColumn(nullable=true)
    */
    private $sokajinAsa;
    
    /**
     * @ORM\ManyToOne(targetEntity="ZanaTsampana", cascade={"persist"}, inversedBy="articles")
     * @ORM\JoinColumn(name="zanaTsampana_id", referencedColumnName="id")
     * @ORM\JoinColumn(nullable=true)
    */
    private $zanaTsampana;
    
    
    public function __construct()
    {
      $this->images = new ArrayCollection();
      $this->videos = new ArrayCollection();
      $this->audios = new ArrayCollection();
      
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
     * @param \backBundle\Entity\Image $imageJacket
     *
     * @return Article
     */
    public function setImageJacket(\backBundle\Entity\Image $imageJacket)
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
     * Add image
     *
     * @param \backBundle\Entity\Image $image
     *
     * @return Article
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
     * @return Article
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
     * Add audio
     *
     * @param \backBundle\Entity\Audio $audio
     *
     * @return Article
     */
    public function addAudio(\backBundle\Entity\Audio $audio)
    {
        $this->audios[] = $audio;

        return $this;
    }

    /**
     * Remove audio
     *
     * @param \backBundle\Entity\Audio $audio
     */
    public function removeAudio(\backBundle\Entity\Audio $audio)
    {
        $this->audios->removeElement($audio);
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
    public function setType(\backBundle\Entity\Type_Article $type)
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
     * Set categorie
     *
     * @param \backBundle\Entity\Categorie $categorie
     *
     * @return Article
     */
    public function setCategorie(\backBundle\Entity\Categorie $categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \backBundle\Entity\Categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Add categorie
     *
     * @param \backBundle\Entity\Categorie $categorie
     *
     * @return Article
     */
    public function addCategorie(\backBundle\Entity\Categorie $categorie)
    {
        $this->categorie[] = $categorie;

        return $this;
    }

    /**
     * Remove categorie
     *
     * @param \backBundle\Entity\Categorie $categorie
     */
    public function removeCategorie(\backBundle\Entity\Categorie $categorie)
    {
        $this->categorie->removeElement($categorie);
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
}
