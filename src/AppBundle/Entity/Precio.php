<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="precios")
 */
class Precio
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
    * @ORM\ManyToOne(targetEntity="PuntoInteres", inversedBy="precios")
    * @Assert\NotBlank()
    */
    protected $puntoInteres;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank()
     */
    protected $tipo;

    /**
     * @ORM\Column(type="float", scale=2)
     * @Assert\NotBlank()
     */
    protected $valor;

    public function getTipo()
    {
        return $this->tipo;
    }
    public function getValor()
    {
        return $this->valor;
    }
    public function setTipo($aTipo)
    {
        $this->tipo = $aTipo;
    }
    public function setValor($aValor)
    {
        $this->valor = $aValor;
    }


    public function setPuntoInteres(PuntoInteres $puntoInteres)
    {
        $this->puntoInteres = $puntoInteres;
    }
}