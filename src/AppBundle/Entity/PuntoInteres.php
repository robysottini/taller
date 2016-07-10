<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="puntos_interes")
 */
class PuntoInteres
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank()
     */
    protected $nombre;

    /**
     * @ORM\Column(type="string", length=256)
     * @Assert\NotBlank()
     */
    protected $descripcion;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank()
     */
    protected $latitud;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank()
     */
    protected $longitud;

    /**
     * @ORM\Column(type="string", length=256)
     * @Assert\Url()
     */
    protected $link_interes;

    /**
     * @ORM\Column(type="string", length=256)
     */
    protected $direccion;

    /**
     * @ORM\ManyToOne(targetEntity="Localidad")
     */
    protected $localidad;

    /**
     * @ORM\ManyToMany(targetEntity="Categoria", cascade={"persist"})
     * @Assert\NotBlank()
     */
    protected $categorias;

    /**
     * @ORM\OneToMany(targetEntity="Foto", cascade={"persist"}, mappedBy="puntoInteres")
     */
    protected $fotos;

    /**
     * @ORM\OneToMany(targetEntity="Video", cascade={"persist"}, mappedBy="puntoInteres")
     */
    protected $videos;

    /**
     * @ORM\OneToMany(targetEntity="Precio", cascade={"persist"}, mappedBy="puntoInteres")
     */
    protected $precios;

    public function __contruct()
    {
        $this->categorias = new ArrayCollection();
        $this->fotos = new ArrayCollection();
        $this->videos = new ArrayCollection();
        $this->precio = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($aNombre)
    {
        $this->nombre = $aNombre;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($aDescripcion)
    {
        $this->descripcion = $aDescripcion;
    }

    public function getLatitud()
    {
        return $this->latitud;
    }

    public function setLatitud($aLatitud)
    {
        $this->latitud = $aLatitud;
    }

    public function getLongitud()
    {
        return $this->longitud;
    }

    public function setLongitud($aLongitud)
    {
        $this->longitud = $aLongitud;
    }

    public function getLinkInteres()
    {
        return $this->link_interes;
    }

    public function setLinkInteres($aLinkInteres)
    {
        $this->link_interes = $aLinkInteres;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($aDireccion)
    {
        $this->direccion = $aDireccion;
    }

    public function getCategorias()
    {
        return $this->categorias;
    }

    public function addCategoria($aCategorias)
    {
        $this->categorias->add($aCategorias);
    }

    public function removeCategoria($aCategorias)
    {
        $this->categorias->remove($aCategorias);
    }

    public function getLocalidad()
    {
        return $this->localidad;
    }

    public function setLocalidad(Localidad $aLocalidad)
    {
        $this->localidad = $aLocalidad;
    }

    public function getFotos()
    {
        return $this->fotos;
    }

    public function setFotos($aFoto)
    {
        $this->fotos = $aFoto;
    }

    public function addFoto(Foto $aFoto)
    {
        $this->fotos[] = $aFoto;
        $aFoto->setPuntoInteres($this);
    }

    public function removeFoto($aFotos)
    {
        $this->fotos->remove($aFotos);
    }

    public function getVideos()
    {
        return $this->videos;
    }

    public function setVideos($aVideo)
    {
        $this->videos = $aVideo;
    }

    public function addVideo(Video $aVideo)
    {
        $this->videos[] = $aVideo;
        $aVideo->setPuntoInteres($this);
    }

    public function removeVideo($aVideos)
    {
        $this->videos->remove($aVideos);
    }

    public function getPrecios()
    {
        return $this->precios;
    }

    public function addPrecio(Precio $aPrecios)
    {
        $this->precios[] = $aPrecios;
        $aPrecios->setPuntoInteres($this);
    }
}