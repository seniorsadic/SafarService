<?php
/**
 * Created by PhpStorm.
 * User: mbayeHann
 * Date: 25/11/2017
 * Time: 11:44
 */

namespace MyServiceBundle\Controller;


use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use MyServiceBundle\Entity\Role;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

class RoleController extends FOSRestController
{
    /**
     * @Rest\Post("/role/")
     */
    public function addRole(Request $request)
    {
        $nom=$request->get('nom');
        $role=new Role();
        $role->setNom($nom);
        $em = $this->getDoctrine()->getManager();
        $em->persist($role);
        $em->flush();
        return $role;
    }

    /**
     * @Rest\Get("/roles")
     */
    public function getAllRole()
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceBundle:Role')->findAll();
        return $restresult;
    }

    /**
     * @Rest\Get("/role/{nom}")
     */
    public function getRoleByDesignation($nom)
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceBundle:Role')->findOneBy(array ('nom' =>$nom));
        return $restresult;
    }

    /**
     * @Rest\Put("/role/{idrole}")
     */
    public function udpdatePrivilege($idrole,Request $request)
    {
        $nom=$request->get('nom');

        $sn = $this->getDoctrine()->getManager();
        $role= $this->getDoctrine()->getRepository('MyServiceBundle:Role')->find($idrole);

        if(!empty($nom)){
            $role->setNom($nom);
            $sn->flush();
        }

        return $role;
    }


    /**
     *@Rest\Delete("/role/{idrole}")
     */
    public function deleteota($idrole)
    {
        $sn = $this->getDoctrine()->getManager();
        $role = $this->getDoctrine()->getRepository('MyServiceBundle:Role')->find($idrole);

        if (empty($role)) {
            return new View("Role not found", Response::HTTP_NOT_FOUND);
        }
        else {
            $sn->remove($role);
            $sn->flush();
        }
        return new View("Role deleted successfully", Response::HTTP_OK);
    }
}