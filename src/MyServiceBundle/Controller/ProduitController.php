<?php
/**
 * Created by PhpStorm.
 * User: mbayeHann
 * Date: 18/11/2017
 * Time: 17:34
 */

namespace MyServiceBundle\Controller;


use FOS\RestBundle\Controller\FOSRestController;
use MyServiceBundle\Entity\Produit;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations as Rest;

class ProduitController extends FOSRestController
{
    /**
     * @Rest\Post("/produit/")
     */
    public function addProduit(Request $request)
    {
        $designation=$request->get('designation');
        $quantite=$request->get('quantite');
        $prix=$request->get('prix');
        $idagence=$request->get('idagence');
        $idcategorie=$request->get('idcategorie');
        $categorie = $this->getDoctrine()->getRepository('MyServiceBundle:Categorie')->find($idcategorie);
        $agence = $this->getDoctrine()->getRepository('MyServiceBundle:Agence')->find($idagence);
        $produit=new Produit();
        $produit->setDesignation($designation);
        $produit->setQuantite($quantite);
        $produit->setPrix($prix);
        $produit->setIdagence($agence);
        $produit->setIdcategorie($categorie);
        $em = $this->getDoctrine()->getManager();
        $em->persist($produit);
        $em->flush();
        return $produit;
    }

    /**
     * @Rest\Get("/produits")
     */
    public function getAllProduit()
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceBundle:Produit')->findAll();
        return $restresult;
    }

    /**
     * @Rest\Get("/produit/{idproduit}")
     */
    public function getProduitById($idproduit)
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceBundle:Produit')->find($idproduit);
        return $restresult;
    }

    /**
     * @Rest\Get("/produitbyagence/{idagence}")
     */
    public function getProduitByAgence($idagence)
    {
        $agence = $this->getDoctrine()->getRepository('MyServiceBundle:Agence')->find($idagence);
        $restresult = $this->getDoctrine()->getRepository('MyServiceBundle:Produit')->findBy(array ('idagence' =>$agence));
        return $restresult;
    }

    /**
     * @Rest\Put("/produit/{idproduit}")
     */
    public function udpdateProduit($idproduit,Request $request)
    {
        $designation=$request->get('designation');
        $quantite=$request->get('quantite');
        $prix=$request->get('prix');
        $idagence=$request->get('idagence');
        $idcategorie=$request->get('idcategorie');

        $sn = $this->getDoctrine()->getManager();
        $produit= $this->getDoctrine()->getRepository('MyServiceBundle:Produit')->find($idproduit);

        if(!empty($designation)){
            $produit->setDesignation($designation);
            $sn->flush();
        }
        if(!empty($quantite)){
            $produit->setQuantite($quantite);
            $sn->flush();
        }
        if(!empty($prix)){
            $produit->setPrix($prix);
            $sn->flush();
        }
        if(!empty($idagence)){
            $agence = $this->getDoctrine()->getRepository('MyServiceBundle:Agence')->find($idagence);
            $produit->setIdagence($agence);
            $sn->flush();
        }
        if(!empty($idcategorie)){
            $categorie = $this->getDoctrine()->getRepository('MyServiceBundle:Categorie')->find($idcategorie);
            $produit->setIdcategorie($categorie);
            $sn->flush();
        }

        return $produit;
    }


    /**
     *@Rest\Delete("/produit/{idproduit}")
     */
    public function deleteProduit($idproduit)
    {
        $sn = $this->getDoctrine()->getManager();
        $produit = $this->getDoctrine()->getRepository('MyServiceBundle:Produit')->find($idproduit);

        if (empty($produit)) {
            return new View("Produit not found", Response::HTTP_NOT_FOUND);
        }
        else {
            $sn->remove($produit);
            $sn->flush();
        }
        return new View("Produit deleted successfully", Response::HTTP_OK);
    }
}