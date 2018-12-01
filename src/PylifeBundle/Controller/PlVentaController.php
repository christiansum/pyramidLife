<?php

namespace PylifeBundle\Controller;

use PylifeBundle\Entity\PlVenta;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Plventum controller.
 *
 */
class PlVentaController extends Controller
{
    /**
     * Lists all plVentum entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $plVentas = $em->getRepository('PylifeBundle:PlVenta')->findAll();

        return $this->render('plventa/index.html.twig', array(
            'plVentas' => $plVentas,
        ));
    }

    /**
     * Creates a new plVentum entity.
     *
     */
    public function newAction(Request $request)
    {
        $plVentum = new Plventum();
        $form = $this->createForm('PylifeBundle\Form\PlVentaType', $plVentum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $plVentum.
            $em = $this->getDoctrine()->getManager();
            $em->persist($plVentum);
            $em->flush();

            return $this->redirectToRoute('venta_show', array('id' => $plVentum->getId()));
        }

        return $this->render('plventa/new.html.twig', array(
            'plVentum' => $plVentum,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a plVentum entity.
     *
     */
    public function showAction(PlVenta $plVentum)
    {
        $deleteForm = $this->createDeleteForm($plVentum);

        return $this->render('plventa/show.html.twig', array(
            'plVentum' => $plVentum,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing plVentum entity.
     *
     */
    public function editAction(Request $request, PlVenta $plVentum)
    {
        $deleteForm = $this->createDeleteForm($plVentum);
        $editForm = $this->createForm('PylifeBundle\Form\PlVentaType', $plVentum);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('venta_edit', array('id' => $plVentum->getId()));
        }

        return $this->render('plventa/edit.html.twig', array(
            'plVentum' => $plVentum,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a plVentum entity.
     *
     */
    public function deleteAction(Request $request, PlVenta $plVentum)
    {
        $form = $this->createDeleteForm($plVentum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($plVentum);
            $em->flush();
        }

        return $this->redirectToRoute('venta_index');
    }

    /**
     * Creates a form to delete a plVentum entity.
     *
     * @param PlVenta $plVentum The plVentum entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PlVenta $plVentum)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('venta_delete', array('id' => $plVentum->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
