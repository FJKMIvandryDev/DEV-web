<?php

namespace backBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use backBundle\Entity\Personne;
use backBundle\Form\PersonneType;

/**
 * Personne controller.
 *
 * @Route("/admin/personne")
 */
class PersonneController extends Controller
{
    /**
     *
     * @Route("/modal", name="personne_modal")
     * @Method({"GET", "POST"})
     */
    public function indexModalAction()
    {
        $personneServ = $this->container->get('personneService');

        $personnes = $personneServ->findAll(); 

        return $this->render('backBundle:Personne:modal.html.twig', array(
            'personnes' => $personnes,
        ));
    }
    
        /**
     *
     * @Route("/modal/{name}", name="personne_find_modal")
     * @Method("GET")
     */
    public function searchModalAction($name)
    {
        $personneServ = $this->container->get('personneService');
        
        $personnes = null;
        
        if ($name != "çééç")
        {
            $personnes = $personneServ->findByName($name);
        }
        else
        {
            $personnes = $personneServ->findAll();
        }

        $serializer = $this->get('serializer');
        
        $jsonContent = $serializer->serialize($personnes, 'json');
        
        $response = new Response($jsonContent);
        $response->headers->set('Content-Type', 'application/json');
        
        return $response;
    }
    
    
    /**
     * Lists all Personne entities.
     *
     * @Route("/", name="personne_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $personneServ = $this->container->get('personneService');
        
        $personnes = $personneServ->findAll();

        return $this->render('backBundle:Personne:index.html.twig', array(
            'personnes' => $personnes,
        ));
    }

    /**
     * Creates a new Personne entity.
     *
     * @Route("/new", name="personne_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $personne = new Personne();
        $form = $this->createForm('backBundle\Form\PersonneType', $personne);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($personne);
            $em->flush();

            return $this->redirectToRoute('personne_show', array('id' => $personne->getId()));
        }

        return $this->render('backBundle:Personne:new.html.twig', array(
            'personne' => $personne,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Personne entity.
     *
     * @Route("/{id}", name="personne_show")
     * @Method("GET")
     */
    public function showAction(Personne $personne)
    {
        $deleteForm = $this->createDeleteForm($personne);

        return $this->render('backBundle:Personne:show.html.twig', array(
            'personne' => $personne,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Personne entity.
     *
     * @Route("/{id}/edit", name="personne_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Personne $personne)
    {
        $deleteForm = $this->createDeleteForm($personne);
        $editForm = $this->createForm('backBundle\Form\PersonneType', $personne);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($personne);
            $em->flush();

            return $this->redirectToRoute('personne_edit', array('id' => $personne->getId()));
        }

        return $this->render('backBundle:Personne:edit.html.twig', array(
            'personne' => $personne,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Personne entity.
     *
     * @Route("/{id}", name="personne_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Personne $personne)
    {
        $form = $this->createDeleteForm($personne);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($personne);
            $em->flush();
        }

        return $this->redirectToRoute('personne_index');
    }

    
    
    
    /**
     * Creates a form to delete a Personne entity.
     *
     * @param Personne $personne The Personne entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Personne $personne)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('personne_delete', array('id' => $personne->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
    
    
    
}
