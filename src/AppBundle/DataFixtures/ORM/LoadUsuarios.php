<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\User;

/**
 * Fixture para usuarios.
 */
class LoadUsuarios extends AbstractFixture implements ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;
    private $manager;
    
    /**
     * Sets the value of container.
     *
     * @param ContainerInterface $container the container
     *
     * @return self
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;

        return $this;
    }

    /**
     * Carga los datos del fixture.
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $userManager = $this->container->get('fos_user.user_manager');

        $administrador = $userManager->createUser();
        $administrador->setUsername('administrador');
        $administrador->setEmail('robysottini@gmail.com');
        $administrador->setPlainPassword('ubuntu');
        $administrador->setEnabled(true);
        $administrador->setRoles(array('ROLE_SUPER_ADMIN'));

        $manager->persist($administrador);
        $manager->flush();
    }
}