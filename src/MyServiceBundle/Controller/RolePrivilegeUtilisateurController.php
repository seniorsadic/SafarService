<?php
/**
 * Created by PhpStorm.
 * User: mbayeHann
 * Date: 25/11/2017
 * Time: 12:26
 */

namespace MyServiceBundle\Controller;


use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use MyServiceBundle\Entity\Privilege;
use MyServiceBundle\Entity\Roleprivilege;
use MyServiceBundle\Entity\Roleutilisateur;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

class RolePrivilegeUtilisateurController extends FOSRestController
{
    /**
     * @Rest\Post("/roleprivilege/")
     */
    public function addRolePrivilege(Request $request)
    {
        $idrole=$request->get('idrole');
        $idprivilege=$request->get('idprivilege');
        $roleprivilege=new Roleprivilege();
        $role = $this->getDoctrine()->getRepository('MyServiceBundle:Role')->find($idrole);
        $privilege = $this->getDoctrine()->getRepository('MyServiceBundle:Privilege')->find($idprivilege);
        $roleprivilege->setIdprivilege($privilege);
        $roleprivilege->setIdrole($role);
        $em = $this->getDoctrine()->getManager();
        $em->persist($roleprivilege);
        $em->flush();
        return $roleprivilege;
    }

    /**
     * @Rest\Post("/userrole/")
     */
    public function addUserRole(Request $request)
    {
        $idrole=$request->get('idrole');
        $iduser=$request->get('iduser');
        $roleuser=new Roleutilisateur();
        $role = $this->getDoctrine()->getRepository('MyServiceBundle:Role')->find($idrole);
        $user = $this->getDoctrine()->getRepository('MyServiceBundle:Utilisateur')->find($iduser);
        $roleuser->setIduser($user);
        $roleuser->setIdrole($role);
        $em = $this->getDoctrine()->getManager();
        $em->persist($roleuser);
        $em->flush();
        return $roleuser;
    }

    /**
     * @Rest\Get("/roleprivilege/{idrole}")
     */
    public function getPrivilegeByRole($idrole)
    {
        $role = $this->getDoctrine()->getRepository('MyServiceBundle:Role')->find($idrole);
        $restresult = $this->getDoctrine()->getRepository('MyServiceBundle:Roleprivilege')->findBy(array ('idrole' =>$role));
        return $restresult;
    }

    /**
     * @Rest\Get("/userrole/{iduser}")
     */
    public function getRoleByUser($iduser)
    {
        $user = $this->getDoctrine()->getRepository('MyServiceBundle:Utilisateur')->find($iduser);
        $restresult = $this->getDoctrine()->getRepository('MyServiceBundle:Roleutilisateur')->findBy(array ('iduser' =>$user));
        return $restresult;
    }
}