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
 * @Route("/admin/membrebureau")
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
        $visiteServ = $this->container->get('visiteService');
        $visite = $visiteServ->findAll();
        $em = $this->getDoctrine()->getManager();

        $membreBureaus = $em->getRepository('backBundle:MembreBureau')->findAll();

        return $this->render('membrebureau/index.html.twig', array(
            'membreBureaus' => $membreBureaus,
            "visite" => $visite,
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
        $visiteServ = $this->container->get('visiteService');
        $visite = $visiteServ->findAll();
        $membreBureau = new MembreBureau();
        $form = $this->createForm('backBundle\Form\MembreBureauType', $membreBureau);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($membreBureau);
            $em->flush();

            return $this->redirectToRoute('membrebureau_show', array(
                'id' => $membreBureau->getId(),
                "visite" => $visite,)
            );
        }

        return $this->render('membrebureau/new.html.twig', array(
            'membreBureau' => $membreBureau,
            'form' => $form->createView(),
            "visite" => $visite,
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
        $visiteServ = $this->container->get('visiteService');
        $visite = $visiteServ->findAll();
        $deleteForm = $this->createDeleteForm($membreBureau);

        return $this->render('membrebureau/show.html.twig', array(
            'membreBureau' => $membreBureau,
            'delete_form' => $deleteForm->createView(),
            "visite" => $visite,
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
        $visiteServ = $this->container->get('visiteService');
        $visite = $visiteServ->findAll();
        $deleteForm = $this->createDeleteForm($membreBureau);
        $editForm = $this->createForm('backBundle\Form\MembreBureauType', $membreBureau);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($membreBureau);
            $em->flush();

            return $this->redirectToRoute('membrebureau_edit', array(
                'id' => $membreBureau->getId(),
                "visite" => $visite,
               )
            );
        }

        return $this->render('membrebureau/edit.html.twig', array(
            'membreBureau' => $membreBureau,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            "visite" => $visite,
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
        $visiteServ = $this->container->get('visiteService');
        $visite = $visiteServ->findAll();
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
        $visiteServ = $this->container->get('visiteService');
        $visite = $visiteServ->findAll();
        
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('membrebureau_delete', array('id' => $membreBureau->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
