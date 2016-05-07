<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Categoria;

/**
* 
*/
class LoadCategorias extends AbstractFixture implements OrderedFixtureInterface 
{
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

        $this->addReference('museo', $museo);
        $this->addReference('puntoHistorico', $puntoHistorico);
        $this->addReference('excursion', $excursion);
    }

    public function getOrder()
    {
        return 2;
    }
    
}