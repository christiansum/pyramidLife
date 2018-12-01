<?php

namespace PylifeBundle\Controller;

use PylifeBundle\Entity\PlPremio;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Plpremio controller.
 *
 */
class PlPremioController extends Controller
{
    /**
     * Lists all plPremio entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $plPremios = $em->getRepository('PylifeBundle:PlPremio')->findAll();

        return $this->render('plpremio/index.html.twig', array(
            'plPremios' => $plPremios,
        ));
    }

    /**
     * Creates a new plPremio entity.
     *
     */
    public function newAction(Request $request)
    {
        $plPremio = new Plpremio();
        $form = $this->createForm('PylifeBundle\Form\PlPremioType', $plPremio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $plPremio.
            $em = $this->getDoctrine()->getManager();
            $em->persist($plPremio);
            $em->flush();

            return $this->redirectToRoute('premio_show', array('id' => $plPremio->getId()));
        }

        return $this->render('plpremio/new.html.twig', array(
            'plPremio' => $plPremio,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a plPremio entity.
     *
     */
    public function showAction(PlPremio $plPremio)
    {
        $deleteForm = $this->createDeleteForm($plPremio);

        return $this->render('plpremio/show.html.twig', array(
            'plPremio' => $plPremio,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing plPremio entity.
     *
     */
    public function editAction(Request $request, PlPremio $plPremio)
    {
        $deleteForm = $this->createDeleteForm($plPremio);
        $editForm = $this->createForm('PylifeBundle\Form\PlPremioType', $plPremio);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('premio_edit', array('id' => $plPremio->getId()));
        }

        return $this->render('plpremio/edit.html.twig', array(
            'plPremio' => $plPremio,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a plPremio entity.
     *
     */
    public function deleteAction(Request $request, PlPremio $plPremio)
    {
        $form = $this->createDeleteForm($plPremio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($plPremio);
            $em->flush();
        }

        return $this->redirectToRoute('premio_index');
    }

    /**
     * Creates a form to delete a plPremio entity.
     *
     * @param PlPremio $plPremio The plPremio entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PlPremio $plPremio)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('premio_delete', array('id' => $plPremio->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
