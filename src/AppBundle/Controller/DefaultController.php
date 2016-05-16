<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="inicio")
     */
    public function indexPublicoAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('inicio.html.twig');
    }

    /**
     * @Route("/admin/", name="inicio_admin")
     */
    public function indexAdminAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('inicio.html.twig');
    }

}
