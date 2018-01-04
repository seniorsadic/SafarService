<?php
/**
 * Created by PhpStorm.
 * User: mbayeHann
 * Date: 25/11/2017
 * Time: 12:56
 */

namespace MyServiceBundle\Controller;


use FOS\RestBundle\Controller\FOSRestController;

use FOS\RestBundle\Controller\Annotations as Rest;
use MyServiceBundle\Entity\Detailvente;
use MyServiceBundle\Entity\Operation;
use MyServiceBundle\Entity\Vente;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

class VenteController extends FOSRestController
{
    /**
     * @Rest\Post("/vente/")
     */
    public function addVente(Request $request)
    {
        $service=$request->get('service');
        $reference=$request->get('reference');
        $statut=$request->get('statut');
        $montant=$request->get('montant');
        $date=$request->get('date');
        $iduser=$request->get('iduser');
        $user = $this->getDoctrine()->getRepository('MyServiceBundle:Utilisateur')->find($iduser);
        $operation=new Operation();
        $operation->setService($service);
        $operation->setStatut($statut);
        $operation->setReference($reference);
        $operation->setMontant($montant);
        $operation->setDate(new \DateTime($date));
        $operation->setIduser($user);
        $vente=new Vente();
        $vente->setIdoperation($operation);
        $em = $this->getDoctrine()->getManager();
        $em->persist($operation);
        $em->persist($vente);
        $em->flush();
       return $vente;
    }

    /**
     * @Rest\Post("/detailsUpload/")
     */
    public function adddetailsUpload(Request $request)
    {
        var_dump( 'Bien');exit();
        $file=$request->get('file');
        $file->move(
            $this->getParameter('%kernel.project_dir%/public/uploads/brochures'),
            'teste'
        );
        return true;
    }

    /**
     * @Rest\Post("/detailsVente/")
     */
    public function addDetailsVente(Request $request)
    {
        $quantite=$request->get('quantite');
        $prixunitaire=$request->get('prixunitaire');
        $remise=$request->get('remise');
        $idvente=$request->get('idvente');
        $idproduit=$request->get('idproduit');
        $vente = $this->getDoctrine()->getRepository('MyServiceBundle:Vente')->find($idvente);
        $produit = $this->getDoctrine()->getRepository('MyServiceBundle:Produit')->find($idproduit);
        if($quantite > $produit->getQuantite())
        {
            return 'Produit insuffant';
        }
        $detailvente=new Detailvente();
        $detailvente->setQuantite($quantite);
        $detailvente->setPrixunitaire($prixunitaire);
        $detailvente->setRemise($remise);
        $detailvente->setIdproduit($produit);
        $detailvente->setIdvente($vente);
        $em = $this->getDoctrine()->getManager();
        $em->persist($detailvente);
        $em->flush();
        $produit->setQuantite($produit->getQuantite()-$quantite);
        $em->flush();
        return $detailvente;
    }

    /**
     * @Rest\Get("/detailvente/{idvente}")
     */
    public function getVenteById($idvente)
    {
        $vente = $this->getDoctrine()->getRepository('MyServiceBundle:Vente')->find($idvente);
        $restresult = $this->getDoctrine()->getRepository('MyServiceBundle:Detailvente')->findBy(array ('idvente' =>$vente));
        return $restresult;
    }
}