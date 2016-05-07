<?php

namespace AppBundle\Controller;
use AppBundle\Entity\PuntoInteres;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PuntosInteresController extends Controller
{
    /**
     * @Route("/puntos-interes", name="puntosinteres_index")
     */
    public function indexAction()
    {
        
        $puntosInteres = $this->getDoctrine()->getRepository('AppBundle:PuntoInteres')->findAll();

        return $this->render('AppBundle:puntosinteres:index.html.twig', array('puntosinteres' => $puntosInteres));
    }

    /**
     * @Route("/puntos-interes/filtro", name="puntosinteres_filtro")
     */
    public function filtroAction(Request $request)
    {
        $punto = new PuntoInteres();

        $form = $this->createFormBuilder()
            ->setMethod('GET')
            ->add('nombre', 'text')
            ->add('Filtrar', 'submit')
            ->getForm();

        $qb = $this->getDoctrine()->getManager()->createQueryBuilder('p');
        $qb->select('p')
            ->from('AppBundle:PuntoInteres','p');

        $form->handleRequest($request);
		
        if($form->isValid()) {

            $criteria = $form->getData();

            $qb->where( $qb->expr()->like('p.nombre','?1'))
                ->setParameter(1,'%' . $criteria['nombre'] . '%');
        }    

        $puntosInteres = $qb->getQuery()->getResult();
        
            /*$em = $this->getDoctrine()->getEntityManager();

            $query = $em->createQuery(
                'SELECT p 
                FROM AppBundle:PuntoInteres p  
                WHERE p.nombre like :nombre '
            )->setParameter('nombre', '%'.$form->get('nombre')->getData().'%' );
            $puntoAux = $query->getResult();            

            return $this->render('AppBundle:puntosinteres:filtro.html.twig', array(
                'puntoAux' => $puntoAux, 
                'form' => $form->createView()
            ));

        }
        else
        {
            echo 'NO! ENTRO!';
        }


    */
        return $this->render(
            'AppBundle:puntosinteres:filtro.html.twig', 
            array('puntosInteres' => $puntosInteres, 'form' => $form->createView(),));
    }
}