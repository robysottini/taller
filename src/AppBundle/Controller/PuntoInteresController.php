<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\PuntoInteres;
use AppBundle\Form\PuntoInteresType;

/**
 * PuntoInteres controller.
 *
 * @Route("/admin/punto-interes")
 */
class PuntoInteresController extends Controller
{
    /**
     * Lists all PuntoInteres entities.
     *
     * @Route("/", name="puntointeres_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $puntoInteres = $em->getRepository('AppBundle:PuntoInteres')->findAll();

        return $this->render('puntointeres/index.html.twig', array(
            'puntoInteres' => $puntoInteres,
        ));
    }

    /**
     * Creates a new PuntoInteres entity.
     *
     * @Route("/new", name="puntointeres_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $puntoIntere = new PuntoInteres();
        $form = $this->createForm('AppBundle\Form\PuntoInteresType', $puntoIntere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($puntoIntere);
            $em->flush();

            return $this->redirectToRoute('puntointeres_show', array('id' => $puntoIntere->getId()));
        }

        return $this->render('puntointeres/new.html.twig', array(
            'puntoIntere' => $puntoIntere,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a PuntoInteres entity.
     *
     * @Route("/{id}", name="puntointeres_show")
     * @Method("GET")
     */
    public function showAction(PuntoInteres $puntoIntere)
    {
        $deleteForm = $this->createDeleteForm($puntoIntere);

        return $this->render('puntointeres/show.html.twig', array(
            'puntoIntere' => $puntoIntere,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing PuntoInteres entity.
     *
     * @Route("/{id}/edit", name="puntointeres_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, PuntoInteres $puntoIntere)
    {
        $deleteForm = $this->createDeleteForm($puntoIntere);
        $editForm = $this->createForm('AppBundle\Form\PuntoInteresType', $puntoIntere);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($puntoIntere);
            $em->flush();

            return $this->redirectToRoute('puntointeres_edit', array('id' => $puntoIntere->getId()));
        }

        return $this->render('puntointeres/edit.html.twig', array(
            'puntoIntere' => $puntoIntere,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a PuntoInteres entity.
     *
     * @Route("/{id}", name="puntointeres_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, PuntoInteres $puntoIntere)
    {
        $form = $this->createDeleteForm($puntoIntere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($puntoIntere);
            $em->flush();
        }

        return $this->redirectToRoute('puntointeres_index');
    }

    /**
     * Creates a form to delete a PuntoInteres entity.
     *
     * @param PuntoInteres $puntoIntere The PuntoInteres entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PuntoInteres $puntoIntere)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('puntointeres_delete', array('id' => $puntoIntere->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
