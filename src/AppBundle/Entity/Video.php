<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="videos")
 */
class Video
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string",length=256)
     */
    protected $link_video;

    /**
    * @ORM\ManyToOne(targetEntity="PuntoInteres", inversedBy="videos")
    */
    protected $puntoInteres;

    public function getId()
    {
        return $this->id;
    }

    public function getLink()
    {
        return $this->link_video;
    }

    public function setLink($aLinkVideo)
    {
        $this->link_video = $aLinkVideo;
    }
    
    public function setPuntoInteres(PuntoInteres $puntoInteres)
    {
        $this->puntoInteres = $puntoInteres;
    }
 }