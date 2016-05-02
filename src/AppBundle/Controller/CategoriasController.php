<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CategoriasController extends Controller
{
    /**
     * @Route("/categorias/index", name="categorias_index")
     */
    public function indexAction()
    {
        $categorias = $this->getDoctrine()->getRepository('AppBundle:Localidad')->findAll();

        return $this->render('AppBundle:categorias:index.html.twig', array('categorias' => $categorias));
    }
}