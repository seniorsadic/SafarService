<?php
/**
 * Created by PhpStorm.
 * User: mbayeHann
 * Date: 25/11/2017
 * Time: 14:20
 */

namespace MyServiceBundle\Controller;


use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use MyServiceBundle\Entity\Typeoperation;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

class TypeOperationController extends FOSRestController
{
    /**
     * @Rest\Post("/typeoperation/")
     */
    public function addTypeOperation(Request $request)
    {
        $type=$request->get('type');
        $typeoperation=new Typeoperation();
        $typeoperation->setType($type);
        $em = $this->getDoctrine()->getManager();
        $em->persist($typeoperation);
        $em->flush();
        return $typeoperation;
    }

    /**
     * @Rest\Get("/typeoperations")
     */
    public function getAllTypeOperation()
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceBundle:TypeOperation')->findAll();
        return $restresult;
    }

    /**
     * @Rest\Get("/typeoperation/{type}")
     */
    public function gettypeoperationByDesignation($type)
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceBundle:TypeOperation')->findOneBy(array ('type' =>$type));
        return $restresult;
    }

    /**
     * @Rest\Put("/typeoperation/{idtypeoperation}")
     */
    public function udpdateTypeOperation($idtypeoperation,Request $request)
    {
        $type=$request->get('type');

        $sn = $this->getDoctrine()->getManager();
        $typeoperation= $this->getDoctrine()->getRepository('MyServiceBundle:TypeOperation')->find($idtypeoperation);

        if(!empty($type)){
            $typeoperation->setType($type);
            $sn->flush();
        }

        return $typeoperation;
    }


    /**
     *@Rest\Delete("/typeoperation/{idtypeoperation}")
     */
    public function deleteTypeOperation($idtypeoperation)
    {
        $sn = $this->getDoctrine()->getManager();
        $typeoperation = $this->getDoctrine()->getRepository('MyServiceBundle:TypeOperation')->find($idtypeoperation);

        if (empty($typeoperation)) {
            return new View("Type operation not found", Response::HTTP_NOT_FOUND);
        }
        else {
            $sn->remove($typeoperation);
            $sn->flush();
        }
        return new View("Type operation deleted successfully", Response::HTTP_OK);
    }
}