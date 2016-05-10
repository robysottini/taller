<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Categoria;

/**
 * Fixture para categorías.
 */
class LoadCategorias extends AbstractFixture implements OrderedFixtureInterface 
{
    /**
     * Carga los datos del fixture.
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $museo = new Categoria();
        $museo->setNombre('Museos');
        $puntoHistorico = new Categoria();
        $puntoHistorico->setNombre('Puntos históricos');
        $excursion = new Categoria();
        $excursion->setNombre('Puntos históricos');

        $manager->persist($museo);
        $manager->persist($excursion);
        $manager->flush();

        // Los objetos $museo, $puntohistorico y $excursión pueden ser 
        // referenciados por otros fixtures que tengan un orden más alto, vía
        // 'ushuaia', 'riogrande' y 'excursion'.
        $this->addReference('museo', $museo);
        $this->addReference('puntoHistorico', $puntoHistorico);
        $this->addReference('excursion', $excursion);
    }

    /**
     * Obtiene el orden en que se carga este fixture.
     * Cuanto menor sea el número, más pronto se cargará el fixtures.
     * @return integer.
     */
    public function getOrder()
    {
        return 2;
    }
    
}