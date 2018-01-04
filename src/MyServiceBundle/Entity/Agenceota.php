<?php

namespace MyServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Agenceota
 *
 * @ORM\Table(name="agenceota", indexes={@ORM\Index(name="FK_Association_1", columns={"idAgence"}), @ORM\Index(name="FK_Association_20", columns={"idOperateur"})})
 * @ORM\Entity
 */
class Agenceota
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idAgenceOta", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idagenceota;

    /**
     * @var \Ota
     *
     * @ORM\ManyToOne(targetEntity="Ota")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idOperateur", referencedColumnName="idOperateur")
     * })
     */
    private $idoperateur;

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
     * Get idagenceota
     *
     * @return integer
     */
    public function getIdagenceota()
    {
        return $this->idagenceota;
    }

    /**
     * Set idoperateur
     *
     * @param \MyServiceBundle\Entity\Ota $idoperateur
     *
     * @return Agenceota
     */
    public function setIdoperateur(\MyServiceBundle\Entity\Ota $idoperateur = null)
    {
        $this->idoperateur = $idoperateur;

        return $this;
    }

    /**
     * Get idoperateur
     *
     * @return \MyServiceBundle\Entity\Ota
     */
    public function getIdoperateur()
    {
        return $this->idoperateur;
    }

    /**
     * Set idagence
     *
     * @param \MyServiceBundle\Entity\Agence $idagence
     *
     * @return Agenceota
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
}
