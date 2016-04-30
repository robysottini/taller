<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class LocalidadesController extends Controller
{
    /**
     * @Route("/localidades/index", name="localidades_index")
     */
    public function indexAction()
    {
        $localidades = $this->getDoctrine()->getRepository('AppBundle:Localidad')->findAll();

        return $this->render('AppBundle:localidades:index.html.twig', array('localidades' => $localidades));
    }
}