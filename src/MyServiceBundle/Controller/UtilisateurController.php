<?php
/**
 * Created by PhpStorm.
 * User: mbayeHann
 * Date: 25/11/2017
 * Time: 12:41
 */

namespace MyServiceBundle\Controller;


use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use MyServiceBundle\Entity\Utilisateur;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

class UtilisateurController extends FOSRestController
{
    /**
     * @Rest\Post("/utilisateur/")
     */
    public function addUtilisateur(Request $request)
    {
        $numero=$request->get('numero');
        $nom=$request->get('nom');
        $prenoms=$request->get('prenoms');
        $idagence=$request->get('idagence');
        $agence = $this->getDoctrine()->getRepository('MyServiceBundle:Agence')->find($idagence);
        $utilisateur=new Utilisateur();
        $utilisateur->setNom($nom);
        $utilisateur->setPrenoms($prenoms);
        $utilisateur->setNumero($numero);
        $utilisateur->setIdagence($agence);
        $em = $this->getDoctrine()->getManager();
        $em->persist($utilisateur);
        $em->flush();
        return $utilisateur;
    }

    /**
     * @Rest\Get("/utilisateurs/")
     */
    public function getAllUtilisateur()
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceBundle:Utilisateur')->findAll();
        return $restresult;
    }

    /**
     * @Rest\Get("/utilisateurbyagence/{idagence}")
     */
    public function getUserByAgence($idagence)
    {
        $agence = $this->getDoctrine()->getRepository('MyServiceBundle:Agence')->find($idagence);
        $restresult = $this->getDoctrine()->getRepository('MyServiceBundle:Utilisateur')->findBy(array ('idagence' =>$agence));
        return $restresult;
    }

    /**
     * @Rest\Get("/utilisateur/{iduser}")
     */
    public function getUserById($iduser)
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceBundle:Utilisateur')->find($iduser);
        return $restresult;
    }

    /**
     * @Rest\Put("/utilisateur/{iduser}")
     */
    public function udpdateUtilisateur($iduser,Request $request)
    {
        $numero=$request->get('numero');
        $nom=$request->get('nom');
        $prenoms=$request->get('prenoms');
        $idagence=$request->get('idagence');

        $sn = $this->getDoctrine()->getManager();
        $user= $this->getDoctrine()->getRepository('MyServiceBundle:Utilisateur')->find($iduser);

        if(!empty($nom)){
            $user->setNom($nom);
            $sn->flush();
        }
        if(!empty($prenoms)){
            $user->setPrenoms($prenoms);
            $sn->flush();
        }
        if(!empty($numero)){
            $user->setNumero($numero);
            $sn->flush();
        }
        if(!empty($idagence)){
            $agence = $this->getDoctrine()->getRepository('MyServiceBundle:Agence')->find($idagence);
            $user->setIdagence($agence);
            $sn->flush();
        }

        return $user;
    }


    /**
     *@Rest\Delete("/utilisateur/{iduser}")
     */
    public function deleteUtilisateur($iduser)
    {
        $sn = $this->getDoctrine()->getManager();
        $user = $this->getDoctrine()->getRepository('MyServiceBundle:Utilisateur')->find($iduser);

        if (empty($user)) {
            return new View("Utilisateur not found", Response::HTTP_NOT_FOUND);
        }
        else {
            $sn->remove($user);
            $sn->flush();
        }
        return new View("Utilisateur deleted successfully", Response::HTTP_OK);
    }
}