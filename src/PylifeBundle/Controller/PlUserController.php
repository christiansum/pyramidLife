<?php

namespace PylifeBundle\Controller;

use PylifeBundle\Entity\PlUser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Pluser controller.
 *
 */
class PlUserController extends Controller
{
    /**
     * Lists all plUser entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $plUsers = $em->getRepository('PylifeBundle:PlUser')->findAll();

        return $this->render('pluser/index.html.twig', array(
            'plUsers' => $plUsers,
        ));
    }

    /**
     * Creates a new plUser entity.
     *
     */
    public function newAction(Request $request)
    {
        $plUser = new Pluser();
        $form = $this->createForm('PylifeBundle\Form\PlUserType', $plUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $plUser.
            $em = $this->getDoctrine()->getManager();
            $em->persist($plUser);
            $em->flush();

            return $this->redirectToRoute('usuarios_show', array('id' => $plUser->getId()));
        }

        return $this->render('pluser/new.html.twig', array(
            'plUser' => $plUser,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a plUser entity.
     *
     */
    public function showAction(PlUser $plUser)
    {
        $deleteForm = $this->createDeleteForm($plUser);

        return $this->render('pluser/show.html.twig', array(
            'plUser' => $plUser,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing plUser entity.
     *
     */
    public function editAction(Request $request, PlUser $plUser)
    {
        $deleteForm = $this->createDeleteForm($plUser);
        $editForm = $this->createForm('PylifeBundle\Form\PlUserType', $plUser);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('usuarios_edit', array('id' => $plUser->getId()));
        }

        return $this->render('pluser/edit.html.twig', array(
            'plUser' => $plUser,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a plUser entity.
     *
     */
    public function deleteAction(Request $request, PlUser $plUser)
    {
        $form = $this->createDeleteForm($plUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($plUser);
            $em->flush();
        }

        return $this->redirectToRoute('usuarios_index');
    }

    /**
     * Creates a form to delete a plUser entity.
     *
     * @param PlUser $plUser The plUser entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PlUser $plUser)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('usuarios_delete', array('id' => $plUser->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
