<?php

namespace PylifeBundle\Controller;

use PylifeBundle\Entity\PlPais;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Plpais controller.
 *
 */
class PlPaisController extends Controller
{
    /**
     * Lists all plPais entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $plPais = $em->getRepository('PylifeBundle:PlPais')->findAll();

        return $this->render('plpais/index.html.twig', array(
            'plPais' => $plPais,
        ));
    }

    /**
     * Creates a new plPais entity.
     *
     */
    public function newAction(Request $request)
    {
        $plPais = new Plpais();
        $form = $this->createForm('PylifeBundle\Form\PlPaisType', $plPais);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($plPais);
            $em->flush();

            return $this->redirectToRoute('pais_show', array('id' => $plPais->getId()));
        }

        return $this->render('plpais/new.html.twig', array(
            'plPai' => $plPais,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a plPai entity.
     *
     */
    public function showAction(PlPais $plPais)
    {
        $deleteForm = $this->createDeleteForm($plPais);

        return $this->render('plpais/show.html.twig', array(
            'plPai' => $plPais,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing plPai entity.
     *
     */
    public function editAction(Request $request, PlPais $plPais)
    {
        $deleteForm = $this->createDeleteForm($plPais);
        $editForm = $this->createForm('PylifeBundle\Form\PlPaisType', $plPais);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pais_edit', array('id' => $plPais->getId()));
        }

        return $this->render('plpais/edit.html.twig', array(
            'plPai' => $plPais,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a plPai entity.
     *
     */
    public function deleteAction(Request $request, PlPais $plPais)
    {
        $form = $this->createDeleteForm($plPais);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($plPais);
            $em->flush();
        }

        return $this->redirectToRoute('pais_index');
    }

    /**
     * Creates a form to delete a plPai entity.
     *
     * @param PlPais $plPais The plPai entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PlPais $plPais)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pais_delete', array('id' => $plPais->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
