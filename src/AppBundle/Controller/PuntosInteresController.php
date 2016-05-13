<?php

namespace AppBundle\Controller;
use AppBundle\Entity\PuntoInteres;
use AppBundle\Entity\Categoria;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
        $categorias = new Categoria();

        $qbCategorias = $this->getDoctrine()->getManager()->createQueryBuilder('c');
        $qbCategorias->select('c')
            ->from('AppBundle:Categoria','c');

        $categorias = $qbCategorias->getQuery()->getResult();

        $form = $this->createFormBuilder()
            ->setMethod('GET')
            ->add('nombre', 'text')
            ->add('Filtrar', 'submit')
            ->add('categoria', EntityType::class, array(
                    'class' => 'AppBundle:Categoria',
                    'choice_label' => 'nombre',
                    'expanded' => true,
                    'multiple' => true))
     
            ->getForm();

        $qb = $this->getDoctrine()->getManager()->createQueryBuilder('p');
        $qb->select('p')
            ->from('AppBundle:PuntoInteres','p');

        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()) {

            $criteria = $form->getData();
            //die(var_dump($criteria['categoria']));

            $qb->where( $qb->expr()->orX(
                            $qb->expr()->like('p.nombre','?1'),
                            $qb->expr()->like('p.descripcion','?1')
                            )
                        )
                        ->where($qb->expr()->eq('p.categoria','?2'))
               ->setParameter(1,'%' . $criteria['nombre'] . '%')    
               ->setParameter(2,$criteria['categoria']);
            $puntosInteres = $qb->getQuery()->getResult();
        }else {
            $puntosInteres = null;
        }

        return $this->render(
            'AppBundle:puntosinteres:filtro.html.twig', 
            array('puntosInteres' => $puntosInteres, 'form' => $form->createView(),));     
    }    

}