<?php

namespace backBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ImageAlbum
 *
 * @ORM\Table(name="image_album")
 * @ORM\Entity(repositoryClass="backBundle\Repository\ImageAlbumRepository")
 */
class ImageAlbum
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
     * @ORM\Column(name="originalName", type="string", length=255, nullable=true)
     */
    private $originalName;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=750)
     */
    private $url;
    
    /**
     * @ORM\Column(name="album_id", type="integer", nullable=true)
     */
    private $albumId;

    /**
     * @ORM\ManyToOne(targetEntity="Album", cascade={"persist"}, inversedBy="images")
     * @ORM\JoinColumn(name="album_id", referencedColumnName="id")
     * @ORM\JoinColumn(nullable=true)
    */
    private $album;



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
     * Set originalName
     *
     * @param string $originalName
     *
     * @return ImageAlbum
     */
    public function setOriginalName($originalName)
    {
        $this->originalName = $originalName;

        return $this;
    }

    /**
     * Get originalName
     *
     * @return string
     */
    public function getOriginalName()
    {
        return $this->originalName;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return ImageAlbum
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set albumId
     *
     * @param integer $albumId
     *
     * @return ImageAlbum
     */
    public function setAlbumId($albumId)
    {
        $this->albumId = $albumId;

        return $this;
    }

    /**
     * Get albumId
     *
     * @return integer
     */
    public function getAlbumId()
    {
        return $this->albumId;
    }

    /**
     * Set album
     *
     * @param \backBundle\Entity\Album $album
     *
     * @return ImageAlbum
     */
    public function setAlbum(\backBundle\Entity\Album $album = null)
    {
        $this->album = $album;

        return $this;
    }

    /**
     * Get album
     *
     * @return \backBundle\Entity\Album
     */
    public function getAlbum()
    {
        return $this->album;
    }
}
