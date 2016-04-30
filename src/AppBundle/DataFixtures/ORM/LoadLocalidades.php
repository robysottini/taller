<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Localidad;

/**
* 
*/
class LoadLocalidades extends AbstractFixture implements OrderedFixtureInterface
{
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

        $this->addReference('ushuaia', $ushuaia);
        $this->addReference('riogrande', $rioGrande);

	}

    public function getOrder()
    {
        return 1;
    }
	
}