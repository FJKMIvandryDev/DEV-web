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
        
        $list = $personneServ->findAll();
        
        return $this->render('backBundle:Personne:index.html.twig', array(
            "list" => $list,
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
        if ($request->isMethod('POST')) 
        {
            $personneServ = $this->container->get('personneService');
            
            $personne = $personneServ->save($request);
  
            return $this->redirectToRoute('personne_index');
        }
        
        $baseurl = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath();

        return $this->render('backBundle:Personne:new.html.twig', array(
            "baseUrl" => $baseurl,
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
    public function editAction(Request $request, $id)
    {
        $personneServ = $this->container->get('personneService');
        
        if ($request->isMethod('POST')) 
        {
            $personneServ->update($request);
  
            return $this->redirectToRoute('personne_index');
        }
        
        $baseurl = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath();

        return $this->render('backBundle:Personne:edit.html.twig', array(
            "baseUrl" => $baseurl,
            "personne" => $personneServ->findById($id),
        ));

    }

    /**
     * Deletes a Personne entity.
     *
     * @Route("/supprimer/{id}", name="personne_delete")
     * @Method("GET")
     */
    public function deleteAction($id)
    {
        $personneServ = $this->container->get('personneService');

        $personneServ->delete($id);
        
        return $this->redirectToRoute('personne_index');
    }
  
}
