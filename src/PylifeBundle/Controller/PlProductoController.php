<?php

namespace PylifeBundle\Controller;

use PylifeBundle\Entity\PlProducto;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Plproducto controller.
 *
 */
class PlProductoController extends Controller
{
    /**
     * Lists all plProducto entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $plProductos = $em->getRepository('PylifeBundle:PlProducto')->findAll();

        return $this->render('plproducto/index.html.twig', array(
            'plProductos' => $plProductos,
        ));
    }

    /**
     * Creates a new plProducto entity.
     *
     */
    public function newAction(Request $request)
    {
        $plProducto = new Plproducto();
        $form = $this->createForm('PylifeBundle\Form\PlProductoType', $plProducto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $plProducto.
            $em = $this->getDoctrine()->getManager();
            $em->persist($plProducto);
            $em->flush();

            return $this->redirectToRoute('producto_show', array('id' => $plProducto->getId()));
        }

        return $this->render('plproducto/new.html.twig', array(
            'plProducto' => $plProducto,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a plProducto entity.
     *
     */
    public function showAction(PlProducto $plProducto)
    {
        $deleteForm = $this->createDeleteForm($plProducto);

        return $this->render('plproducto/show.html.twig', array(
            'plProducto' => $plProducto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing plProducto entity.
     *
     */
    public function editAction(Request $request, PlProducto $plProducto)
    {
        $deleteForm = $this->createDeleteForm($plProducto);
        $editForm = $this->createForm('PylifeBundle\Form\PlProductoType', $plProducto);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('producto_edit', array('id' => $plProducto->getId()));
        }

        return $this->render('plproducto/edit.html.twig', array(
            'plProducto' => $plProducto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a plProducto entity.
     *
     */
    public function deleteAction(Request $request, PlProducto $plProducto)
    {
        $form = $this->createDeleteForm($plProducto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($plProducto);
            $em->flush();
        }

        return $this->redirectToRoute('producto_index');
    }

    /**
     * Creates a form to delete a plProducto entity.
     *
     * @param PlProducto $plProducto The plProducto entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PlProducto $plProducto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('producto_delete', array('id' => $plProducto->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
