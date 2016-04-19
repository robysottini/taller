<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fotos")
 */
class Foto
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
    protected $link_foto;

    /**
    * @ORM\ManyToOne(targetEntity="PuntoInteres", inversedBy="fotos")
    */
    protected $puntoInteres;

    public function getId()
    {
        return $this->id;
    }

    public function getLink()
    {
        return $this->link_foto;
    }

    public function setLink($aLinkFoto)
    {
        $this->link_foto = $aLinkFoto;
    }

    public function setPuntoInteres(PuntoInteres $puntoInteres)
    {
        $this->puntoInteres = $puntoInteres;
    }
}