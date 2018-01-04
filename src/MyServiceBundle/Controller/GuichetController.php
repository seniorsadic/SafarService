<?php
/**
 * Created by PhpStorm.
 * User: mbayeHann
 * Date: 25/11/2017
 * Time: 09:13
 */

namespace MyServiceBundle\Controller;


use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use MyServiceBundle\Entity\Guichet;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

class GuichetController extends FOSRestController
{
    /**
     * @Rest\Post("/guichet/")
     */
    public function addGuichet(Request $request)
    {
        $numero=$request->get('numero');
        $idagence=$request->get('idagence');
        $agence = $this->getDoctrine()->getRepository('MyServiceBundle:Agence')->find($idagence);
        $guichet=new Guichet();
        $guichet->setNumero($numero);
        $guichet->setIdagence($agence);
        $em = $this->getDoctrine()->getManager();
        $em->persist($guichet);
        $em->flush();
        return $guichet;
    }

    /**
     * @Rest\Get("/guichet/{agence}")
     */
    public function getGuichetByAgence($agence)
    {
        $agence = $this->getDoctrine()->getRepository('MyServiceBundle:Agence')->find($agence);
        $restresult = $this->getDoctrine()->getRepository('MyServiceBundle:Guichet')->findBy(array('idagence' =>$agence));
        return $restresult;
    }

    /**
     *@Rest\Delete("/guichet/{idguichet}")
     */
    public function deleteguichet($idguichet)
    {
        $sn = $this->getDoctrine()->getManager();
        $guichet = $this->getDoctrine()->getRepository('MyServiceBundle:Guichet')->find($idguichet);

        if (empty($guichet)) {
            return new View("Guichet not found", Response::HTTP_NOT_FOUND);
        }
        else {
            $sn->remove($guichet);
            $sn->flush();
        }
        return new View("Guichet deleted successfully", Response::HTTP_OK);
    }
}