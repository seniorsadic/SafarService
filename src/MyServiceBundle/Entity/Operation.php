<?php

namespace MyServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Operation
 *
 * @ORM\Table(name="operation", indexes={@ORM\Index(name="FK_Association_11", columns={"idUser"})})
 * @ORM\Entity
 */
class Operation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idOperation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idoperation;

    /**
     * @var string
     *
     * @ORM\Column(name="service", type="string", length=254, nullable=true)
     */
    private $service;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=254, nullable=true)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=254, nullable=true)
     */
    private $statut;

    /**
     * @var string
     *
     * @ORM\Column(name="montant", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $montant;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUser", referencedColumnName="idUser")
     * })
     */
    private $iduser;



    /**
     * Get idoperation
     *
     * @return integer
     */
    public function getIdoperation()
    {
        return $this->idoperation;
    }

    /**
     * Set service
     *
     * @param string $service
     *
     * @return Operation
     */
    public function setService($service)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get service
     *
     * @return string
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * Set reference
     *
     * @param string $reference
     *
     * @return Operation
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set statut
     *
     * @param string $statut
     *
     * @return Operation
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return string
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set montant
     *
     * @param string $montant
     *
     * @return Operation
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return string
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Operation
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set iduser
     *
     * @param \MyServiceBundle\Entity\Utilisateur $iduser
     *
     * @return Operation
     */
    public function setIduser(\MyServiceBundle\Entity\Utilisateur $iduser = null)
    {
        $this->iduser = $iduser;

        return $this;
    }

    /**
     * Get iduser
     *
     * @return \MyServiceBundle\Entity\Utilisateur
     */
    public function getIduser()
    {
        return $this->iduser;
    }
}
