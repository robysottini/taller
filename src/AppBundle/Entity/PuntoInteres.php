<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="puntos_interes")
 */
class PuntosInteres
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string",length=50)
     */
    protected $nombre;

    /**
     * @ORM\Column(type="string",length=50)
     */
    protected $descripcion;

    /**
     * @ORM\Column(type="string",length=50)
     */
    protected $latitud;

    /**
     * @ORM\Column(type="string",length=50)
     */
    protected $longitud;

    /**
     * @ORM\Column(type="string",length=256)
     */
    protected $link_interes;

    /**
     * @ORM\Column(type="string",length=256)
     */
    protected $direccion;

    /**
     * @ORM\ManyToOne(targetEntity="Localidad")
     */
    protected $localidad;


}