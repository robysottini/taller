<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Foto;
use AppBundle\Entity\PuntoInteres;
use AppBundle\Entity\Video;
use AppBundle\Form\PuntoInteresType;
use AppBundle\Form\PuntoInteresCreateType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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

        $puntosInteres = $em->getRepository('AppBundle:PuntoInteres')->findAll();

        return $this->render('puntointeres/index.html.twig', array(
            'puntosInteres' => $puntosInteres,
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
        $puntoInteres = new PuntoInteres();
        $form = $this->createForm('AppBundle\Form\PuntoInteresCreateType', $puntoInteres);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();

            $puntoInteres->setLinkInteres('http://');
            $puntoInteres->setLatitud(0);
            $puntoInteres->setLongitud(0);
            $puntoInteres->setDireccion('');

            $em->persist($puntoInteres);
            $em->flush();

            return $this->redirectToRoute('puntointeres_index');
        }

        return $this->render('puntointeres/new.html.twig', array(
            'puntoInteres' => $puntoInteres,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a PuntoInteres entity.
     *
     * @Route("/{id}", name="puntointeres_show")
     * @Method("GET")
     */
    public function showAction(PuntoInteres $puntoInteres)
    {
        $deleteForm = $this->createDeleteForm($puntoInteres);

        return $this->render('puntointeres/show.html.twig', array(
            'puntoInteres' => $puntoInteres,
            'delete_form'  => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing PuntoInteres entity.
     *
     * @Route("/{id}/edit", name="puntointeres_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, PuntoInteres $puntoInteres)
    {
        $deleteForm = $this->createDeleteForm($puntoInteres);
        $editForm = $this->createForm('AppBundle\Form\PuntoInteresType', $puntoInteres);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            //die(var_dump($_POST));

            $em = $this->getDoctrine()->getManager();

            // Borro todas las fotos.
            foreach ($puntoInteres->getFotos() as $foto) {
                $em->remove($foto);
            }
            $em->flush();

            // Agrego foto al punto de interés.
            foreach ($request->request->get('fotos') as $fotoUrl) {
                $foto = new Foto();
                $foto->setLink($fotoUrl);

                $puntoInteres->addFoto($foto);
            }

            // Borro todos los videos.
            foreach ($puntoInteres->getVideos() as $video) {
                $em->remove($video);
            }
            $em->flush();

            // Agrego video al punto de interés.
            foreach ($request->request->get('videos') as $videoUrl) {
                $video = new Video();
                $video->setLink($videoUrl);

                $puntoInteres->addVideo($video);
            }

            $em->persist($puntoInteres);
            $em->flush();

            return $this->redirectToRoute('puntointeres_index');
        }

        return $this->render('puntointeres/edit.html.twig', array(
            'puntoInteres' => $puntoInteres,
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
    public function deleteAction(Request $request, PuntoInteres $puntoInteres)
    {
        $form = $this->createDeleteForm($puntoInteres);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->remove($puntoInteres);
            $em->flush();
        }

        return $this->redirectToRoute('puntointeres_index');
    }

    /**
     * Creates a form to delete a PuntoInteres entity.
     *
     * @param PuntoInteres $puntoInteres The PuntoInteres entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PuntoInteres $puntoInteres)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('puntointeres_delete', array('id' => $puntoInteres->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
