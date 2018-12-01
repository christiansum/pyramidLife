<?php

namespace PylifeBundle\Controller;

use PylifeBundle\Entity\PlPeriodoPremio;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Plperiodopremio controller.
 *
 */
class PlPeriodoPremioController extends Controller
{
    /**
     * Lists all plPeriodoPremio entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $plPeriodoPremios = $em->getRepository('PylifeBundle:PlPeriodoPremio')->findAll();

        return $this->render('plperiodopremio/index.html.twig', array(
            'plPeriodoPremios' => $plPeriodoPremios,
        ));
    }

    /**
     * Creates a new plPeriodoPremio entity.
     *
     */
    public function newAction(Request $request)
    {
        $plPeriodoPremio = new Plperiodopremio();
        $form = $this->createForm('PylifeBundle\Form\PlPeriodoPremioType', $plPeriodoPremio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $plPeriodoPremio.
            $em = $this->getDoctrine()->getManager();
            $em->persist($plPeriodoPremio);
            $em->flush();

            return $this->redirectToRoute('periopre_show', array('id' => $plPeriodoPremio->getId()));
        }

        return $this->render('plperiodopremio/new.html.twig', array(
            'plPeriodoPremio' => $plPeriodoPremio,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a plPeriodoPremio entity.
     *
     */
    public function showAction(PlPeriodoPremio $plPeriodoPremio)
    {
        $deleteForm = $this->createDeleteForm($plPeriodoPremio);

        return $this->render('plperiodopremio/show.html.twig', array(
            'plPeriodoPremio' => $plPeriodoPremio,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing plPeriodoPremio entity.
     *
     */
    public function editAction(Request $request, PlPeriodoPremio $plPeriodoPremio)
    {
        $deleteForm = $this->createDeleteForm($plPeriodoPremio);
        $editForm = $this->createForm('PylifeBundle\Form\PlPeriodoPremioType', $plPeriodoPremio);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('periopre_edit', array('id' => $plPeriodoPremio->getId()));
        }

        return $this->render('plperiodopremio/edit.html.twig', array(
            'plPeriodoPremio' => $plPeriodoPremio,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a plPeriodoPremio entity.
     *
     */
    public function deleteAction(Request $request, PlPeriodoPremio $plPeriodoPremio)
    {
        $form = $this->createDeleteForm($plPeriodoPremio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($plPeriodoPremio);
            $em->flush();
        }

        return $this->redirectToRoute('periopre_index');
    }

    /**
     * Creates a form to delete a plPeriodoPremio entity.
     *
     * @param PlPeriodoPremio $plPeriodoPremio The plPeriodoPremio entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PlPeriodoPremio $plPeriodoPremio)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('periopre_delete', array('id' => $plPeriodoPremio->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
