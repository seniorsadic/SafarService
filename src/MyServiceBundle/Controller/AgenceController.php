<?php
/**
 * Created by PhpStorm.
 * User: mbayeHann
 * Date: 19/11/2017
 * Time: 12:50
 */

namespace MyServiceBundle\Controller;


use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use MyServiceBundle\Entity\Agence;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

class AgenceController extends FOSRestController
{
    /**
     * @Rest\Post("/agence/")
     */
    public function addAgence(Request $request)
    {
        $designation=$request->get('designation');
        $idville=$request->get('idville');
        $ville = $this->getDoctrine()->getRepository('MyServiceBundle:Ville')->find($idville);
        $agence=new Agence();
        $agence->setDesignation($designation);
        $agence->setIdville($ville);
        $em = $this->getDoctrine()->getManager();
        $em->persist($agence);
        $em->flush();
        return $agence;
    }

    /**
     * @Rest\Get("/agences")
     */
    public function getAllAgence()
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceBundle:Agence')->findAll();
        return $restresult;
    }

    /**
     * @Rest\Get("/agence/{idagence}")
     */
    public function getAgenceById($idagence)
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceBundle:Agence')->find($idagence);
        return $restresult;
    }

    /**
     * @Rest\Put("/agence/{idagence}")
     */
    public function udpdateAgence($idagence,Request $request)
    {
        $designation=$request->get('designation');
        $idville=$request->get('idville');

        $sn = $this->getDoctrine()->getManager();
        $agence= $this->getDoctrine()->getRepository('MyServiceBundle:Agence')->find($idagence);

        if(!empty($designation)){
            $agence->setDesignation($designation);
            $sn->flush();
        }

        if(!empty($idville)){
            $ville = $this->getDoctrine()->getRepository('MyServiceBundle:Ville')->find($idville);
            $agence->setIdville($ville);
            $sn->flush();
        }

        return $agence;
    }


    /**
     *@Rest\Delete("/agence/{idagence}")
     */
    public function deleteota($idagence)
    {
        $sn = $this->getDoctrine()->getManager();
        $agence = $this->getDoctrine()->getRepository('MyServiceBundle:Agence')->find($idagence);

        if (empty($agence)) {
            return new View("Agence not found", Response::HTTP_NOT_FOUND);
        }
        else {
            $sn->remove($agence);
            $sn->flush();
        }
        return new View("Agence deleted successfully", Response::HTTP_OK);
    }
}