<?php

namespace AppBundle\Controller;
use AppBundle\Entity\PuntoInteres;
use AppBundle\Entity\Categoria;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class PuntosInteresController extends Controller
{
    /**
     * @Route("/puntos-interes", name="puntosinteres_index")
     */
    public function indexAction(Request $request)
    {        
        $punto = new PuntoInteres();
        $categorias = new Categoria();
    
        $qbCategorias = $this->getDoctrine()->getManager()->createQueryBuilder('c');
        $qbCategorias->select('c')
            ->from('AppBundle:Categoria','c');
    
        $categorias = $qbCategorias->getQuery()->getResult();
    
        $form = $this->createFormBuilder()
            ->setMethod('GET')
            ->add('nombre', 'text')
            ->add('Filtrar', 'submit')
    
            ->getForm();
    
        $qb = $this->getDoctrine()->getManager()->createQueryBuilder('p');
        $qb->select('p')
            ->from('AppBundle:PuntoInteres','p');
    
        $form->handleRequest($request);
    
        if($form->isSubmitted() && $form->isValid()) {
    
            $criteria = $form->getData();
            // die(var_dump($criteria['categoria']));
    
            $qb->where( 
                        $qb->expr()->orX(
                            $qb->expr()->like('p.nombre','?1'),
                            $qb->expr()->like('p.descripcion','?1')))
                ->setParameter(1,'%' . $criteria['nombre'] . '%');
                
            $puntosInteres = $qb->getQuery()->getResult();
        }else {
            $puntosInteres = $this->getDoctrine()->getRepository('AppBundle:PuntoInteres')->findAll();
        }
    
        return $this->render(
            'AppBundle:puntosinteres:filtro.html.twig', 
            array('puntosinteres' => $puntosInteres, 'form' => $form->createView(),));
  }

    /**
     * @Route("/puntos-interes/{id}", name="puntosinteres_completo")
     * @Method("GET")
     */
    public function completoAction(PuntoInteres $puntoInteres)
    {
        return $this->render(
            'AppBundle:puntosinteres:articuloCompleto.html.twig', 
            array('puntoInteres' => $puntoInteres,));     
    } 
}