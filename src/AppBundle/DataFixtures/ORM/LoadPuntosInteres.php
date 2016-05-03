<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\PuntoInteres;
use AppBundle\Entity\Foto;
use AppBundle\Entity\Video;
use AppBundle\Entity\Precio;

class LoadPuntosInteres extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $ushuaia = $this->getReference('ushuaia');
        $museo = $this->getReference('museo');
        $puntoHistorico = $this->getReference('puntoHistorico');
        $excursion = $this->getReference('excursion');

        $link1Foto = new Foto();
        $link1Foto->setLink('https://upload.wikimedia.org/wikipedia/commons/2/22/Museo_del_Fin_del_Mundo30.jpg');
        $link2Foto = new Foto();
        $link2Foto->setLink('http://www.notitdf.com/noticias/leer/15844-cruzada-solidaria-catamaranes-canoero-faltan-170-pasajeros-para-llegar-a-la-meta.html');

        $link1Video = new Video();
        $link1Video->setLink('link-video-1');
        $link2Video = new Video();
        $link2Video->setLink('link-video-2');

        $precio = new Precio();
        $precio->setTipo('Residente');
        $precio->setValor(50);

        $punto1 = new PuntoInteres();
        $punto1->setNombre('Museo del Fin del Mundo');
        $punto1->setDescripcion('Es una de las construcciones emblemáticas de la ciudad. Una de las pocas construidas con mampostería, en los primeros años del pueblo. El terreno fue adquirido al entonces gobernador Manuel Fernández Valdés en 1911, e incluía una vivienda en construcción.');
        $punto1->setLatitud('-54.805556');
        $punto1->setLongitud('-68.3');
        $punto1->setLinkInteres('www.museofindelmundo.com.ar');
        $punto1->setDireccion('Avenida Maipú 173');
        $punto1->setLocalidad($ushuaia);
        $punto1->addCategorias($museo);
        $punto1->addCategorias($puntoHistorico);
        $punto1->addFoto($link1Foto);
        $punto1->addFoto($link2Foto);
        $punto1->addVideo($link2Video);
        $punto1->addPrecio($precio);

        $punto2 = new PuntoInteres();
        $punto2->setNombre('Catamarán Canoero');
        $punto2->setDescripcion('Excursión a la pingüinera y a la estancia Harberton.');
        $punto2->setLatitud('-54.80865');
        $punto2->setLongitud('-68.30283333333333');
        $punto2->setLinkInteres('www.catamaranescanoero.com.ar');
        $punto2->setDireccion('Avenida Maipú 300');
        $punto2->setLocalidad($ushuaia);
        $punto2->addCategorias($excursion);
        $punto2->addVideo($link1Video);

        $manager->persist($punto1);
        $manager->persist($punto2);
        $manager->flush();
    }
    
    public function getOrder()
    {
        return 3;
    }
    
}