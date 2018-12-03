<?php

namespace PylifeBundle\Controller;

use PylifeBundle\Entity\PlRango;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Plrango controller.
 *
 */
class PlRangoController extends Controller
{
    /**
     * Lists all plRango entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $plRangos = $em->getRepository('PylifeBundle:PlRango')->findAll();

        return $this->render('plrango/index.html.twig', array(
            'plRangos' => $plRangos,
        ));
    }

    /**
     * Creates a new plRango entity.
     *
     */
    public function newAction(Request $request)
    {
        $plRango = new Plrango();
        $form = $this->createForm('PylifeBundle\Form\PlRangoType', $plRango);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($plRango);
            $em->flush();

            return $this->redirectToRoute('rangos_show', array('id' => $plRango->getId()));
        }

        return $this->render('plrango/new.html.twig', array(
            'plRango' => $plRango,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a plRango entity.
     *
     */
    public function showAction(PlRango $plRango)
    {
        $deleteForm = $this->createDeleteForm($plRango);

        return $this->render('plrango/show.html.twig', array(
            'plRango' => $plRango,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing plRango entity.
     *
     */
    public function editAction(Request $request, PlRango $plRango)
    {
        $deleteForm = $this->createDeleteForm($plRango);
        $editForm = $this->createForm('PylifeBundle\Form\PlRangoType', $plRango);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rangos_edit', array('id' => $plRango->getId()));
        }

        return $this->render('plrango/edit.html.twig', array(
            'plRango' => $plRango,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a plRango entity.
     *
     */
    public function deleteAction(Request $request, PlRango $plRango)
    {
        $form = $this->createDeleteForm($plRango);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($plRango);
            $em->flush();
        }

        return $this->redirectToRoute('rangos_index');
    }

    /**
     * Creates a form to delete a plRango entity.
     *
     * @param PlRango $plRango The plRango entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PlRango $plRango)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('rangos_delete', array('id' => $plRango->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
