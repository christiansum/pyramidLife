<?php

namespace PylifeBundle\Controller;

use PylifeBundle\Entity\PlPosicion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Plposicion controller.
 *
 */
class PlPosicionController extends Controller
{
    /**
     * Lists all plPosicion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $plPosicions = $em->getRepository('PylifeBundle:PlPosicion')->findAll();

        return $this->render('plposicion/index.html.twig', array(
            'plPosicions' => $plPosicions,
        ));
    }

    /**
     * Creates a new plPosicion entity.
     *
     */
    public function newAction(Request $request)
    {
        $plPosicion = new Plposicion();
        $form = $this->createForm('PylifeBundle\Form\PlPosicionType', $plPosicion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $plPosicion.
            $em = $this->getDoctrine()->getManager();
            $em->persist($plPosicion);
            $em->flush();

            return $this->redirectToRoute('posicion_show', array('id' => $plPosicion->getId()));
        }

        return $this->render('plposicion/new.html.twig', array(
            'plPosicion' => $plPosicion,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a plPosicion entity.
     *
     */
    public function showAction(PlPosicion $plPosicion)
    {
        $deleteForm = $this->createDeleteForm($plPosicion);

        return $this->render('plposicion/show.html.twig', array(
            'plPosicion' => $plPosicion,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing plPosicion entity.
     *
     */
    public function editAction(Request $request, PlPosicion $plPosicion)
    {
        $deleteForm = $this->createDeleteForm($plPosicion);
        $editForm = $this->createForm('PylifeBundle\Form\PlPosicionType', $plPosicion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('posicion_edit', array('id' => $plPosicion->getId()));
        }

        return $this->render('plposicion/edit.html.twig', array(
            'plPosicion' => $plPosicion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a plPosicion entity.
     *
     */
    public function deleteAction(Request $request, PlPosicion $plPosicion)
    {
        $form = $this->createDeleteForm($plPosicion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($plPosicion);
            $em->flush();
        }

        return $this->redirectToRoute('posicion_index');
    }

    /**
     * Creates a form to delete a plPosicion entity.
     *
     * @param PlPosicion $plPosicion The plPosicion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PlPosicion $plPosicion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('posicion_delete', array('id' => $plPosicion->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
