<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PuntosInteresController extends Controller
{
    /**
     * @Route("/puntosinteres/index", name="puntosinteres_index")
     */
    public function indexAction()
    {
        $puntosInteres = $this->getDoctrine()->getRepository('AppBundle:PuntoInteres')->findAll();

        return $this->render('AppBundle:puntosinteres:index.html.twig', array('puntosinteres' => $puntosInteres));
    }
}