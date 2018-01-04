<?php

namespace MyServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit", indexes={@ORM\Index(name="FK_Association_3", columns={"idCategorie"}), @ORM\Index(name="FK_Association_5", columns={"idAgence"})})
 * @ORM\Entity
 */
class Produit
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idProduit", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idproduit;

    /**
     * @var string
     *
     * @ORM\Column(name="designation", type="string", length=254, nullable=true)
     */
    private $designation;

    /**
     * @var string
     *
     * @ORM\Column(name="quantite", type="string", length=254, nullable=true)
     */
    private $quantite;

    /**
     * @var string
     *
     * @ORM\Column(name="prix", type="string", length=254, nullable=true)
     */
    private $prix;

    /**
     * @var \Agence
     *
     * @ORM\ManyToOne(targetEntity="Agence")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idAgence", referencedColumnName="idAgence")
     * })
     */
    private $idagence;

    /**
     * @var \Categorie
     *
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCategorie", referencedColumnName="idCategorie")
     * })
     */
    private $idcategorie;



    /**
     * Get idproduit
     *
     * @return integer
     */
    public function getIdproduit()
    {
        return $this->idproduit;
    }

    /**
     * Set designation
     *
     * @param string $designation
     *
     * @return Produit
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get designation
     *
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set quantite
     *
     * @param string $quantite
     *
     * @return Produit
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return string
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set prix
     *
     * @param string $prix
     *
     * @return Produit
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return string
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set idagence
     *
     * @param \MyServiceBundle\Entity\Agence $idagence
     *
     * @return Produit
     */
    public function setIdagence(\MyServiceBundle\Entity\Agence $idagence = null)
    {
        $this->idagence = $idagence;

        return $this;
    }

    /**
     * Get idagence
     *
     * @return \MyServiceBundle\Entity\Agence
     */
    public function getIdagence()
    {
        return $this->idagence;
    }

    /**
     * Set idcategorie
     *
     * @param \MyServiceBundle\Entity\Categorie $idcategorie
     *
     * @return Produit
     */
    public function setIdcategorie(\MyServiceBundle\Entity\Categorie $idcategorie = null)
    {
        $this->idcategorie = $idcategorie;

        return $this;
    }

    /**
     * Get idcategorie
     *
     * @return \MyServiceBundle\Entity\Categorie
     */
    public function getIdcategorie()
    {
        return $this->idcategorie;
    }
}
