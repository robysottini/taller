<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Localidad;

/**
 * Fixture para localidades.
 */
class LoadLocalidades extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Carga los datos del fixture.
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $ushuaia = new Localidad();
        $ushuaia->setNombre('Ushuaia');
        $ushuaia->setCodigoPostal('9410');
        $rioGrande = new Localidad();
        $rioGrande->setNombre('Río Grande');
        $rioGrande->setCodigoPostal('9420');

        $manager->persist($ushuaia);
        $manager->persist($rioGrande);
        $manager->flush();

        // Los objetos $ushuaia y $riogrande pueden ser referenciados por otros
        // fixtures que tengan un orden más alto, vía 'ushuaia' y 'riogrande'.
        $this->addReference('ushuaia', $ushuaia);
        $this->addReference('riogrande', $rioGrande);

    }

    /**
     * Obtiene el orden en que se carga este fixture.
     * Cuanto menor sea el número, más pronto se cargará el fixtures.
     * @return integer.
     */
    public function getOrder()
    {
        return 1;
    }
    
}