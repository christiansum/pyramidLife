<?php

namespace PylifeBundle\Controller;

use PylifeBundle\Entity\PlMoneda;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Plmoneda controller.
 *
 */
class PlMonedaController extends Controller
{
    /**
     * Lists all plMoneda entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $plMonedas = $em->getRepository('PylifeBundle:PlMoneda')->findAll();

        return $this->render('plmoneda/index.html.twig', array(
            'plMonedas' => $plMonedas,
        ));
    }

    /**
     * Creates a new plMoneda entity.
     *
     */
    public function newAction(Request $request)
    {
        $plMoneda = new Plmoneda();
        $form = $this->createForm('PylifeBundle\Form\PlMonedaType', $plMoneda);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $plMoneda.
            $em = $this->getDoctrine()->getManager();
            $em->persist($plMoneda);
            $em->flush();

            return $this->redirectToRoute('moneda_show', array('id' => $plMoneda->getId()));
        }

        return $this->render('plmoneda/new.html.twig', array(
            'plMoneda' => $plMoneda,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a plMoneda entity.
     *
     */
    public function showAction(PlMoneda $plMoneda)
    {
        $deleteForm = $this->createDeleteForm($plMoneda);

        return $this->render('plmoneda/show.html.twig', array(
            'plMoneda' => $plMoneda,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing plMoneda entity.
     *
     */
    public function editAction(Request $request, PlMoneda $plMoneda)
    {
        $deleteForm = $this->createDeleteForm($plMoneda);
        $editForm = $this->createForm('PylifeBundle\Form\PlMonedaType', $plMoneda);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('moneda_edit', array('id' => $plMoneda->getId()));
        }

        return $this->render('plmoneda/edit.html.twig', array(
            'plMoneda' => $plMoneda,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a plMoneda entity.
     *
     */
    public function deleteAction(Request $request, PlMoneda $plMoneda)
    {
        $form = $this->createDeleteForm($plMoneda);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($plMoneda);
            $em->flush();
        }

        return $this->redirectToRoute('moneda_index');
    }

    /**
     * Creates a form to delete a plMoneda entity.
     *
     * @param PlMoneda $plMoneda The plMoneda entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PlMoneda $plMoneda)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('moneda_delete', array('id' => $plMoneda->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
