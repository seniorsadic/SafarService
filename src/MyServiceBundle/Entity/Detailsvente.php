<?php

namespace MyServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Detailsvente
 *
 * @ORM\Table(name="detailsvente", indexes={@ORM\Index(name="AK_idProduit", columns={"idProduit"}), @ORM\Index(name="FK_DetailVente25", columns={"idVente"})})
 * @ORM\Entity
 */
class Detailsvente
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idDetailVente", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iddetailvente;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer", nullable=true)
     */
    private $quantite;

    /**
     * @var string
     *
     * @ORM\Column(name="prixUnitaire", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $prixunitaire;

    /**
     * @var string
     *
     * @ORM\Column(name="remise", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $remise;

    /**
     * @var \Vente
     *
     * @ORM\ManyToOne(targetEntity="Vente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idVente", referencedColumnName="idVente")
     * })
     */
    private $idvente;

    /**
     * @var \Produit
     *
     * @ORM\ManyToOne(targetEntity="Produit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idProduit", referencedColumnName="idProduit")
     * })
     */
    private $idproduit;



    /**
     * Set idvente
     *
     * @param integer $idvente
     *
     * @return Detailsvente
     */
    public function setIdvente($idvente)
    {
        $this->idvente = $idvente;

        return $this;
    }

    /**
     * Get idvente
     *
     * @return integer
     */
    public function getIdvente()
    {
        return $this->idvente;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return Detailsvente
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set prixunitaire
     *
     * @param string $prixunitaire
     *
     * @return Detailsvente
     */
    public function setPrixunitaire($prixunitaire)
    {
        $this->prixunitaire = $prixunitaire;

        return $this;
    }

    /**
     * Get prixunitaire
     *
     * @return string
     */
    public function getPrixunitaire()
    {
        return $this->prixunitaire;
    }

    /**
     * Set remise
     *
     * @param string $remise
     *
     * @return Detailsvente
     */
    public function setRemise($remise)
    {
        $this->remise = $remise;

        return $this;
    }

    /**
     * Get remise
     *
     * @return string
     */
    public function getRemise()
    {
        return $this->remise;
    }

    /**
     * Get iddetailvente
     *
     * @return integer
     */
    public function getIddetailvente()
    {
        return $this->iddetailvente;
    }

    /**
     * Set idproduit
     *
     * @param \MyServiceBundle\Entity\Produit $idproduit
     *
     * @return Detailsvente
     */
    public function setIdproduit(\MyServiceBundle\Entity\Produit $idproduit = null)
    {
        $this->idproduit = $idproduit;

        return $this;
    }

    /**
     * Get idproduit
     *
     * @return \MyServiceBundle\Entity\Produit
     */
    public function getIdproduit()
    {
        return $this->idproduit;
    }
}
