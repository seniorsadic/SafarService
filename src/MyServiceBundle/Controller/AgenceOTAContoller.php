<?php
/**
 * Created by PhpStorm.
 * User: mbayeHann
 * Date: 24/11/2017
 * Time: 21:46
 */

namespace MyServiceBundle\Controller;


use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use MyServiceBundle\Entity\Agenceota;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

class AgenceOTAContoller extends FOSRestController
{
    /**
     * @Rest\Post("/agenceota/")
     */
    public function addAgenceOta(Request $request)
    {
        $idoperateur=$request->get('idoperateur');
        $idagence=$request->get('idagence');
        $agenceota=new Agenceota();
        $agence = $this->getDoctrine()->getRepository('MyServiceBundle:Agence')->find($idagence);
        $operateur = $this->getDoctrine()->getRepository('MyServiceBundle:Ota')->find($idoperateur);
        $agenceota->setIdagence($agence);
        $agenceota->setIdoperateur($operateur);
        $em = $this->getDoctrine()->getManager();
        $em->persist($agenceota);
        $em->flush();
        return $agenceota;
    }

    /**
     * @Rest\Get("/agenceota/{agence}")
     */
    public function getOtaByAgence($agence)
    {
        $agence = $this->getDoctrine()->getRepository('MyServiceBundle:Agence')->find($agence);
        $restresult = $this->getDoctrine()->getRepository('MyServiceBundle:Agenceota')->findBy(array ('idagence' =>$agence));
        return $restresult;
    }


    /**
     *@Rest\Delete("/agenceota/{idagenceota}")
     */
    public function deleteota($idagenceota)
    {
        $sn = $this->getDoctrine()->getManager();
        $agenceota = $this->getDoctrine()->getRepository('MyServiceBundle:Agenceota')->find($idagenceota);

        if (empty($agenceota)) {
            return new View("Agence and OTA not found", Response::HTTP_NOT_FOUND);
        }
        else {
            $sn->remove($agenceota);
            $sn->flush();
        }
        return new View("Agence and OTA deleted successfully", Response::HTTP_OK);
    }
}