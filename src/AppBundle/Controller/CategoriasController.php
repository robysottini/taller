<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CategoriasController extends Controller
{
    /**
     * @Route("/admin/categorias", name="categorias_index")
     */
    public function indexAction()
    {
        $categorias = $this->getDoctrine()->getRepository('AppBundle:Categoria')->findAll();

        return $this->render('AppBundle:categorias:index.html.twig', array('categorias' => $categorias));
    }
}