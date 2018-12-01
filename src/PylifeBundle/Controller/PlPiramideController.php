<?php

namespace PylifeBundle\Controller;

use PylifeBundle\Entity\PlPiramide;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Plpiramide controller.
 *
 */
class PlPiramideController extends Controller
{
    /**
     * Lists all plPiramide entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $plPiramides = $em->getRepository('PylifeBundle:PlPiramide')->findAll();

        return $this->render('plpiramide/index.html.twig', array(
            'plPiramides' => $plPiramides,
        ));
    }

    /**
     * Creates a new plPiramide entity.
     *
     */
    public function newAction(Request $request)
    {
        $plPiramide = new Plpiramide();
        $form = $this->createForm('PylifeBundle\Form\PlPiramideType', $plPiramide);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $plPiramide.
            $em = $this->getDoctrine()->getManager();
            $em->persist($plPiramide);
            $em->flush();

            return $this->redirectToRoute('arbol_show', array('id' => $plPiramide->getId()));
        }

        return $this->render('plpiramide/new.html.twig', array(
            'plPiramide' => $plPiramide,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a plPiramide entity.
     *
     */
    public function showAction(PlPiramide $plPiramide)
    {
        $deleteForm = $this->createDeleteForm($plPiramide);

        return $this->render('plpiramide/show.html.twig', array(
            'plPiramide' => $plPiramide,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing plPiramide entity.
     *
     */
    public function editAction(Request $request, PlPiramide $plPiramide)
    {
        $deleteForm = $this->createDeleteForm($plPiramide);
        $editForm = $this->createForm('PylifeBundle\Form\PlPiramideType', $plPiramide);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('arbol_edit', array('id' => $plPiramide->getId()));
        }

        return $this->render('plpiramide/edit.html.twig', array(
            'plPiramide' => $plPiramide,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a plPiramide entity.
     *
     */
    public function deleteAction(Request $request, PlPiramide $plPiramide)
    {
        $form = $this->createDeleteForm($plPiramide);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($plPiramide);
            $em->flush();
        }

        return $this->redirectToRoute('arbol_index');
    }

    /**
     * Creates a form to delete a plPiramide entity.
     *
     * @param PlPiramide $plPiramide The plPiramide entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PlPiramide $plPiramide)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('arbol_delete', array('id' => $plPiramide->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
