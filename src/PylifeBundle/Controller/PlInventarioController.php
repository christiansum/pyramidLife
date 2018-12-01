<?php

namespace PylifeBundle\Controller;

use PylifeBundle\Entity\PlInventario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Plinventario controller.
 *
 */
class PlInventarioController extends Controller
{
    /**
     * Lists all plInventario entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $plInventarios = $em->getRepository('PylifeBundle:PlInventario')->findAll();

        return $this->render('plinventario/index.html.twig', array(
            'plInventarios' => $plInventarios,
        ));
    }

    /**
     * Creates a new plInventario entity.
     *
     */
    public function newAction(Request $request)
    {
        $plInventario = new Plinventario();
        $form = $this->createForm('PylifeBundle\Form\PlInventarioType', $plInventario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $plInventario.
            $em = $this->getDoctrine()->getManager();
            $em->persist($plInventario);
            $em->flush();

            return $this->redirectToRoute('inventario_show', array('id' => $plInventario->getId()));
        }

        return $this->render('plinventario/new.html.twig', array(
            'plInventario' => $plInventario,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a plInventario entity.
     *
     */
    public function showAction(PlInventario $plInventario)
    {
        $deleteForm = $this->createDeleteForm($plInventario);

        return $this->render('plinventario/show.html.twig', array(
            'plInventario' => $plInventario,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing plInventario entity.
     *
     */
    public function editAction(Request $request, PlInventario $plInventario)
    {
        $deleteForm = $this->createDeleteForm($plInventario);
        $editForm = $this->createForm('PylifeBundle\Form\PlInventarioType', $plInventario);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('inventario_edit', array('id' => $plInventario->getId()));
        }

        return $this->render('plinventario/edit.html.twig', array(
            'plInventario' => $plInventario,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a plInventario entity.
     *
     */
    public function deleteAction(Request $request, PlInventario $plInventario)
    {
        $form = $this->createDeleteForm($plInventario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($plInventario);
            $em->flush();
        }

        return $this->redirectToRoute('inventario_index');
    }

    /**
     * Creates a form to delete a plInventario entity.
     *
     * @param PlInventario $plInventario The plInventario entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PlInventario $plInventario)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('inventario_delete', array('id' => $plInventario->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
