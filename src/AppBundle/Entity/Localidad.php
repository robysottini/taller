<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="localidades")
 */
class Localidad
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $nombre;

    /**
     * @ORM\Column(type="string", length=10)
     */
    protected $codigo_postal;

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getCodigoPostal()
    {
        return $this->codigo_postal;
    }

    public function setNombre($aNombre)
    {
        $this->nombre = $aNombre;
    }

    public function setCodigoPostal($aCodigoPostal)
    {
        $this->codigo_postal = $aCodigoPostal;
    }

}