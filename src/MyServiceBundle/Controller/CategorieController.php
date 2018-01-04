<?php
/**
 * Created by PhpStorm.
 * User: mbayeHann
 * Date: 18/11/2017
 * Time: 17:06
 */

namespace MyServiceBundle\Controller;


use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use MyServiceBundle\Entity\Categorie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

class CategorieController extends FOSRestController
{
    /**
     * @Rest\Post("/categorie/")
     */
    public function addCategorie(Request $request)
    {
        $designation=$request->get('designation');
        $categorie=new Categorie();
        $categorie->setDesignation($designation);
        $em = $this->getDoctrine()->getManager();
        $em->persist($categorie);
        $em->flush();
        return $categorie;
    }

    /**
     * @Rest\Get("/categories")
     */
    public function getAllCategorie()
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceBundle:Categorie')->findAll();
        return $restresult;
    }



    /**
     * @Rest\Get("/categorie/{idcategorie}")
     */
    public function getCategorieById($idcategorie)
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceBundle:Categorie')->find($idcategorie);
        return $restresult;
    }

    /**
     * @Rest\Get("/categorie/{designation}")
     */
    public function getCategorieByDesignation($designation)
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceBundle:Categorie')->findOneBy(array ('designation' =>$designation));
        return $restresult;
    }

    /**
     * @Rest\Put("/categorie/{idcategorie}")
     */
    public function udpdateQuestion($idcategorie,Request $request)
    {
        $designation=$request->get('designation');

        $sn = $this->getDoctrine()->getManager();
        $categorie= $this->getDoctrine()->getRepository('MyServiceBundle:Categorie')->find($idcategorie);

        if(!empty($designation)){
            $categorie->setDesignation($designation);
            $sn->flush();
        }

        return $categorie;
    }


    /**
     *@Rest\Delete("/categorie/{idcategorie}")
     */
    public function deleteota($idcategorie)
    {
        $sn = $this->getDoctrine()->getManager();
        $categorie = $this->getDoctrine()->getRepository('MyServiceBundle:Categorie')->find($idcategorie);

        if (empty($categorie)) {
            return new View("Categorie not found", Response::HTTP_NOT_FOUND);
        }
        else {
            $sn->remove($categorie);
            $sn->flush();
        }
        return new View("Categorie deleted successfully", Response::HTTP_OK);
    }
}