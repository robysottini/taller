<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\PuntoInteres;

/**
 * Api controller.
 *
 * @Route("/api")
 */
class ApiController extends Controller
{
    /**
     *
     * @Route("/puntos-interes", name="api_puntos_interes_index")
     * @Method("GET")
     * 
     */
    public function puntosInteresAction()
    {
        $em = $this->getDoctrine()->getManager();

        $puntoInteres = $em->getRepository('AppBundle:PuntoInteres')->findAll();

        $respuesta = [];

        foreach ($puntoInteres as $punto) {
            $arregloFotos = $punto->getFotos();
            $foto = $arregloFotos[0]->getLink();
            $res = array(
                'id' => $punto->getId(),
                'nombre' => $punto->getNombre(),
                'descripcion' => $punto->getDescripcion(),
                'urlImagen' => $foto
                );
            array_push($respuesta, $res);
        }

        $response = new JsonResponse();
        $response->setData($respuesta);
        $response->headers->set('Access-Control-Allow-Origin','*');
        return $response;
    }

    /**
     *
     * @Route("/puntos-interes/{id}", name="api_un_puntos_interes_index")
     * @Method("GET")
     * 
     */
    public function unPuntoInteresAction(Request $request, PuntoInteres $punto)
    {
        $arregloFotos = $punto->getFotos();
        $foto = $arregloFotos[0]->getLink();

        $res = array(
            'id' => $punto->getId(),
            'nombre' => $punto->getNombre(),
            'descripcion' => $punto->getDescripcion(),
            'urlImagen' => $foto,
            'latitud' => $punto->getLatitud(),
            'longitud' => $punto->getLongitud(),
            'direccion' => $punto->getDireccion()
        );
        $response = new JsonResponse();
        $response->setData($res);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }

    /**
     *
     * @Route("/coordenadas", name="api_coordenadas_index")
     * @Method("GET")
     * 
     */
    public function coordenadas()
    {
        $em = $this->getDoctrine()->getManager();

        $puntoInteres = $em->getRepository('AppBundle:PuntoInteres')->findAll();

        $respuesta = [];

        foreach ($puntoInteres as $punto) {
            $res = array(
                'id' => $punto->getId(),
                'nombre' => $punto->getNombre(),
                'latitud' => $punto->getLatitud(),
                'longitud' => $punto->getLongitud()
                );
            array_push($respuesta, $res);
        }

        $response = new JsonResponse();
        $response->setData($respuesta);
        $response->headers->set('Access-Control-Allow-Origin','*');
        return $response;
    }
}