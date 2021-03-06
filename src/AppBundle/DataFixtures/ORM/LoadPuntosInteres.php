<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\PuntoInteres;
use AppBundle\Entity\Foto;
use AppBundle\Entity\Video;
use AppBundle\Entity\Precio;

/**
 * Fixture para puntos de interés.
 */
class LoadPuntosInteres extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Carga los datos del fixture.
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        // Acceso a los objetos 'ushuaia', 'museo', 'puntoHistorico' y
        // 'excursión'.
        $ushuaia = $this->getReference('ushuaia');
        $museo = $this->getReference('museo');
        $puntoHistorico = $this->getReference('puntoHistorico');
        $excursion = $this->getReference('excursion');

        $linkFotoMuseo1 = new Foto();
        $linkFotoMuseo1->setLink('https://upload.wikimedia.org/wikipedia/commons/2/22/Museo_del_Fin_del_Mundo30.jpg');
        $linkFotoMuseo2 = new Foto();
        $linkFotoMuseo2->setLink('http://farm3.static.flickr.com/2434/3578067868_6503ba528e_b.jpg');
        $linkFotoCatamaran = new Foto();
        $linkFotoCatamaran->setLink('http://www.notitdf.com/media/noticias/ampl_cruzada-solidaria-catamaranes-canoero-faltan-170-pasajeros-para-llegar-a-la-meta_15844.jpg');

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
        $punto1->addCategoria($museo);
        $punto1->addCategoria($puntoHistorico);
        $punto1->addFoto($linkFotoMuseo1);
        $punto1->addFoto($linkFotoMuseo2);
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
        $punto2->addCategoria($excursion);
        $punto2->addFoto($linkFotoCatamaran);
        $punto2->addVideo($link1Video);

        $manager->persist($punto1);
        $manager->persist($punto2);
        $manager->flush();
    }
    
    /**
     * Obtiene el orden en que se carga este fixture.
     * Cuanto menor sea el número, más pronto se cargará el fixtures.
     * @return integer.
     */
    public function getOrder()
    {
        return 3;
    }
    
}