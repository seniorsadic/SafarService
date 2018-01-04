<?php
/**
 * Created by PhpStorm.
 * User: mbayeHann
 * Date: 25/11/2017
 * Time: 09:31
 */

namespace MyServiceBundle\Controller;


use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use MyServiceBundle\Entity\Privilege;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

class PrivilegeController extends FOSRestController
{
    /**
     * @Rest\Post("/privilege/")
     */
    public function addPrivilege(Request $request)
    {
        $nom=$request->get('nom');
        $pivilege=new Privilege();
        $pivilege->setNom($nom);
        $em = $this->getDoctrine()->getManager();
        $em->persist($pivilege);
        $em->flush();
        return $pivilege;
    }

    /**
     * @Rest\Get("/privileges")
     */
    public function getAllPrivilege()
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceBundle:Privilege')->findAll();
        return $restresult;
    }

    /**
     * @Rest\Get("/privilege/{nom}")
     */
    public function getPrivilegeByDesignation($nom)
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceBundle:Privilege')->findOneBy(array ('nom' =>$nom));
        return $restresult;
    }

    /**
     * @Rest\Put("/privilege/{idprivilege}")
     */
    public function udpdatePrivilege($idprivilege,Request $request)
    {
        $nom=$request->get('nom');

        $sn = $this->getDoctrine()->getManager();
        $privilege= $this->getDoctrine()->getRepository('MyServiceBundle:Privilege')->find($idprivilege);

        if(!empty($nom)){
            $privilege->setNom($nom);
            $sn->flush();
        }

        return $privilege;
    }


    /**
     *@Rest\Delete("/privilege/{idprivilege}")
     */
    public function deleteota($idprivilege)
    {
        $sn = $this->getDoctrine()->getManager();
        $privilege = $this->getDoctrine()->getRepository('MyServiceBundle:Privilege')->find($idprivilege);

        if (empty($privilege)) {
            return new View("Privilege not found", Response::HTTP_NOT_FOUND);
        }
        else {
            $sn->remove($privilege);
            $sn->flush();
        }
        return new View("Privilege deleted successfully", Response::HTTP_OK);
    }
}