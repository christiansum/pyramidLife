<?php

namespace PylifeBundle\Controller;

use PylifeBundle\Entity\PlPais;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Plpai controller.
 *
 */
class PlPaisController extends Controller
{
    /**
     * Lists all plPai entities.
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
     * Creates a new plPai entity.
     *
     */
    public function newAction(Request $request)
    {
        $plPai = new Plpai();
        $form = $this->createForm('PylifeBundle\Form\PlPaisType', $plPai);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($plPai);
            $em->flush();

            return $this->redirectToRoute('pais_show', array('id' => $plPai->getId()));
        }

        return $this->render('plpais/new.html.twig', array(
            'plPai' => $plPai,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a plPai entity.
     *
     */
    public function showAction(PlPais $plPai)
    {
        $deleteForm = $this->createDeleteForm($plPai);

        return $this->render('plpais/show.html.twig', array(
            'plPai' => $plPai,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing plPai entity.
     *
     */
    public function editAction(Request $request, PlPais $plPai)
    {
        $deleteForm = $this->createDeleteForm($plPai);
        $editForm = $this->createForm('PylifeBundle\Form\PlPaisType', $plPai);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pais_edit', array('id' => $plPai->getId()));
        }

        return $this->render('plpais/edit.html.twig', array(
            'plPai' => $plPai,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a plPai entity.
     *
     */
    public function deleteAction(Request $request, PlPais $plPai)
    {
        $form = $this->createDeleteForm($plPai);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($plPai);
            $em->flush();
        }

        return $this->redirectToRoute('pais_index');
    }

    /**
     * Creates a form to delete a plPai entity.
     *
     * @param PlPais $plPai The plPai entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PlPais $plPai)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pais_delete', array('id' => $plPai->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
