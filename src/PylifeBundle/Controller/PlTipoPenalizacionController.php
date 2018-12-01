<?php

namespace PylifeBundle\Controller;

use PylifeBundle\Entity\PlTipoPenalizacion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Pltipopenalizacion controller.
 *
 */
class PlTipoPenalizacionController extends Controller
{
    /**
     * Lists all plTipoPenalizacion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $plTipoPenalizacions = $em->getRepository('PylifeBundle:PlTipoPenalizacion')->findAll();

        return $this->render('pltipopenalizacion/index.html.twig', array(
            'plTipoPenalizacions' => $plTipoPenalizacions,
        ));
    }

    /**
     * Creates a new plTipoPenalizacion entity.
     *
     */
    public function newAction(Request $request)
    {
        $plTipoPenalizacion = new Pltipopenalizacion();
        $form = $this->createForm('PylifeBundle\Form\PlTipoPenalizacionType', $plTipoPenalizacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $plTipoPenalizacion.
            $em = $this->getDoctrine()->getManager();
            $em->persist($plTipoPenalizacion);
            $em->flush();

            return $this->redirectToRoute('tipena_show', array('id' => $plTipoPenalizacion->getId()));
        }

        return $this->render('pltipopenalizacion/new.html.twig', array(
            'plTipoPenalizacion' => $plTipoPenalizacion,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a plTipoPenalizacion entity.
     *
     */
    public function showAction(PlTipoPenalizacion $plTipoPenalizacion)
    {
        $deleteForm = $this->createDeleteForm($plTipoPenalizacion);

        return $this->render('pltipopenalizacion/show.html.twig', array(
            'plTipoPenalizacion' => $plTipoPenalizacion,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing plTipoPenalizacion entity.
     *
     */
    public function editAction(Request $request, PlTipoPenalizacion $plTipoPenalizacion)
    {
        $deleteForm = $this->createDeleteForm($plTipoPenalizacion);
        $editForm = $this->createForm('PylifeBundle\Form\PlTipoPenalizacionType', $plTipoPenalizacion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tipena_edit', array('id' => $plTipoPenalizacion->getId()));
        }

        return $this->render('pltipopenalizacion/edit.html.twig', array(
            'plTipoPenalizacion' => $plTipoPenalizacion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a plTipoPenalizacion entity.
     *
     */
    public function deleteAction(Request $request, PlTipoPenalizacion $plTipoPenalizacion)
    {
        $form = $this->createDeleteForm($plTipoPenalizacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($plTipoPenalizacion);
            $em->flush();
        }

        return $this->redirectToRoute('tipena_index');
    }

    /**
     * Creates a form to delete a plTipoPenalizacion entity.
     *
     * @param PlTipoPenalizacion $plTipoPenalizacion The plTipoPenalizacion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PlTipoPenalizacion $plTipoPenalizacion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipena_delete', array('id' => $plTipoPenalizacion->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
