<?php

namespace PylifeBundle\Controller;

use PylifeBundle\Entity\PlRole;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Plrole controller.
 *
 */
class PlRoleController extends Controller
{
    /**
     * Lists all plRole entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $plRoles = $em->getRepository('PylifeBundle:PlRole')->findAll();

        return $this->render('plrole/index.html.twig', array(
            'plRoles' => $plRoles,
        ));
    }

    /**
     * Creates a new plRole entity.
     *
     */
    public function newAction(Request $request)
    {
        $plRole = new Plrole();
        $form = $this->createForm('PylifeBundle\Form\PlRoleType', $plRole);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $plRole.
            $em = $this->getDoctrine()->getManager();
            $em->persist($plRole);
            $em->flush();

            return $this->redirectToRoute('roles_show', array('id' => $plRole->getId()));
        }

        return $this->render('plrole/new.html.twig', array(
            'plRole' => $plRole,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a plRole entity.
     *
     */
    public function showAction(PlRole $plRole)
    {
        $deleteForm = $this->createDeleteForm($plRole);

        return $this->render('plrole/show.html.twig', array(
            'plRole' => $plRole,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing plRole entity.
     *
     */
    public function editAction(Request $request, PlRole $plRole)
    {
        $deleteForm = $this->createDeleteForm($plRole);
        $editForm = $this->createForm('PylifeBundle\Form\PlRoleType', $plRole);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('roles_edit', array('id' => $plRole->getId()));
        }

        return $this->render('plrole/edit.html.twig', array(
            'plRole' => $plRole,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a plRole entity.
     *
     */
    public function deleteAction(Request $request, PlRole $plRole)
    {
        $form = $this->createDeleteForm($plRole);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($plRole);
            $em->flush();
        }

        return $this->redirectToRoute('roles_index');
    }

    /**
     * Creates a form to delete a plRole entity.
     *
     * @param PlRole $plRole The plRole entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PlRole $plRole)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('roles_delete', array('id' => $plRole->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
