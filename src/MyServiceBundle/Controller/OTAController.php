<?php
/**
 * Created by PhpStorm.
 * User: mbayeHann
 * Date: 18/11/2017
 * Time: 16:47
 */

namespace MyServiceBundle\Controller;


use FOS\RestBundle\Controller\FOSRestController;
use MyServiceBundle\Entity\Ota;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

class OTAController extends FOSRestController
{
    /**
     * @Rest\Post("/ota/")
     */
    public function addOta(Request $request)
    {
        $designation=$request->get('designation');
        $code=$request->get('code');
        $ota=new Ota();
        $ota->setDesignation($designation);
        $ota->setCode($code);
        $em = $this->getDoctrine()->getManager();
        $em->persist($ota);
        $em->flush();
        return $ota;
    }
    /**
     * @Rest\Get("/ota/{idota}")
     */
    public function getOTAById($idota)
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceBundle:Ota')->find($idota);
        return $restresult;
    }

    /**
     * @Rest\Get("/otas")
     */
    public function getAllOTA()
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceBundle:Ota')->findAll();
        return $restresult;
    }

    /**
     * @Rest\Get("/ota/{designation}")
     */
    public function getOtaByDesignation($designation)
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceBundle:Ota')->findOneBy(array ('designation' =>$designation));
        return $restresult;
    }

    /**
     * @Rest\Put("/ota/{idoperateur}")
     */
    public function udpdateQuestion($idoperateur,Request $request)
    {
        $designation=$request->get('designation');
        $code=$request->get('code');

        $sn = $this->getDoctrine()->getManager();
        $ota= $this->getDoctrine()->getRepository('MyServiceBundle:Ota')->find($idoperateur);

        if(!empty($designation)){
            $ota->setDesignation($designation);
            $sn->flush();
        }

        if(!empty($code)){
            $ota->setCode($code);
            $sn->flush();
        }

        return $ota;
    }


    /**
     *@Rest\Delete("/ota/{idoperateur}")
     */
    public function deleteota($idoperateur)
    {
        $sn = $this->getDoctrine()->getManager();
        $ota = $this->getDoctrine()->getRepository('MyServiceBundle:Ota')->find($idoperateur);

        if (empty($ota)) {
            return new View("ota not found", Response::HTTP_NOT_FOUND);
        }
        else {
            $sn->remove($ota);
            $sn->flush();
        }
        return new View("ota deleted successfully", Response::HTTP_OK);
    }

}