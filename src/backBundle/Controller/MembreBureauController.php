<?php

namespace backBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use backBundle\Entity\MembreBureau;
use backBundle\Form\MembreBureauType;

/**
 * MembreBureau controller.
 *
 * @Route("/membrebureau")
 */
class MembreBureauController extends Controller
{
    /**
     * Lists all MembreBureau entities.
     *
     * @Route("/", name="membrebureau_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $membreBureaus = $em->getRepository('backBundle:MembreBureau')->findAll();

        return $this->render('membrebureau/index.html.twig', array(
            'membreBureaus' => $membreBureaus,
        ));
    }

    /**
     * Creates a new MembreBureau entity.
     *
     * @Route("/new", name="membrebureau_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $membreBureau = new MembreBureau();
        $form = $this->createForm('backBundle\Form\MembreBureauType', $membreBureau);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($membreBureau);
            $em->flush();

            return $this->redirectToRoute('membrebureau_show', array('id' => $membreBureau->getId()));
        }

        return $this->render('membrebureau/new.html.twig', array(
            'membreBureau' => $membreBureau,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MembreBureau entity.
     *
     * @Route("/{id}", name="membrebureau_show")
     * @Method("GET")
     */
    public function showAction(MembreBureau $membreBureau)
    {
        $deleteForm = $this->createDeleteForm($membreBureau);

        return $this->render('membrebureau/show.html.twig', array(
            'membreBureau' => $membreBureau,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MembreBureau entity.
     *
     * @Route("/{id}/edit", name="membrebureau_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MembreBureau $membreBureau)
    {
        $deleteForm = $this->createDeleteForm($membreBureau);
        $editForm = $this->createForm('backBundle\Form\MembreBureauType', $membreBureau);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($membreBureau);
            $em->flush();

            return $this->redirectToRoute('membrebureau_edit', array('id' => $membreBureau->getId()));
        }

        return $this->render('membrebureau/edit.html.twig', array(
            'membreBureau' => $membreBureau,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a MembreBureau entity.
     *
     * @Route("/{id}", name="membrebureau_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MembreBureau $membreBureau)
    {
        $form = $this->createDeleteForm($membreBureau);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($membreBureau);
            $em->flush();
        }

        return $this->redirectToRoute('membrebureau_index');
    }

    /**
     * Creates a form to delete a MembreBureau entity.
     *
     * @param MembreBureau $membreBureau The MembreBureau entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MembreBureau $membreBureau)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('membrebureau_delete', array('id' => $membreBureau->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
