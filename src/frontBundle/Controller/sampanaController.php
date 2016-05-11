<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
/**
 * Description of sampanaController
 *
 * @author ptdr-Onja
 */


class sampanaController extends Controller
{
 
    public function zanaTsampanaGetAction()
    {
        return $this->render('frontBundle:template:sampana.html.twig');
    }
    
    
    public function zanaTsampanaContaintAction()
    {
        $request = Request::createFromGlobals();
        
        $ongletName = $request->query->get('ongletName');
        
        return $this->render('frontBundle:ajaxView:zanaTsampanaTemplate.html.twig',array(
            'nomSampana' => $ongletName,
        )
                );
    }
}
