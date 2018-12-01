<?php

namespace PylifeBundle\Controller;

use PylifeBundle\Entity\PlPenalizacion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Plpenalizacion controller.
 *
 */
class PlPenalizacionController extends Controller
{
    /**
     * Lists all plPenalizacion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $plPenalizacions = $em->getRepository('PylifeBundle:PlPenalizacion')->findAll();

        return $this->render('plpenalizacion/index.html.twig', array(
            'plPenalizacions' => $plPenalizacions,
        ));
    }

    /**
     * Creates a new plPenalizacion entity.
     *
     */
    public function newAction(Request $request)
    {
        $plPenalizacion = new Plpenalizacion();
        $form = $this->createForm('PylifeBundle\Form\PlPenalizacionType', $plPenalizacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $plPenalizacion.
            $em = $this->getDoctrine()->getManager();
            $em->persist($plPenalizacion);
            $em->flush();

            return $this->redirectToRoute('penali_show', array('id' => $plPenalizacion->getId()));
        }

        return $this->render('plpenalizacion/new.html.twig', array(
            'plPenalizacion' => $plPenalizacion,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a plPenalizacion entity.
     *
     */
    public function showAction(PlPenalizacion $plPenalizacion)
    {
        $deleteForm = $this->createDeleteForm($plPenalizacion);

        return $this->render('plpenalizacion/show.html.twig', array(
            'plPenalizacion' => $plPenalizacion,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing plPenalizacion entity.
     *
     */
    public function editAction(Request $request, PlPenalizacion $plPenalizacion)
    {
        $deleteForm = $this->createDeleteForm($plPenalizacion);
        $editForm = $this->createForm('PylifeBundle\Form\PlPenalizacionType', $plPenalizacion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('penali_edit', array('id' => $plPenalizacion->getId()));
        }

        return $this->render('plpenalizacion/edit.html.twig', array(
            'plPenalizacion' => $plPenalizacion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a plPenalizacion entity.
     *
     */
    public function deleteAction(Request $request, PlPenalizacion $plPenalizacion)
    {
        $form = $this->createDeleteForm($plPenalizacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($plPenalizacion);
            $em->flush();
        }

        return $this->redirectToRoute('penali_index');
    }

    /**
     * Creates a form to delete a plPenalizacion entity.
     *
     * @param PlPenalizacion $plPenalizacion The plPenalizacion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PlPenalizacion $plPenalizacion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('penali_delete', array('id' => $plPenalizacion->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
