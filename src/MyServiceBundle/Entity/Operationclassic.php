<?php

namespace MyServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Operationclassic
 *
 * @ORM\Table(name="operationclassic", indexes={@ORM\Index(name="FK_Association_14", columns={"idTypeOperation"}), @ORM\Index(name="FK_Association_6", columns={"idOperateur"}), @ORM\Index(name="FK_Generalisation_3", columns={"idOperation"})})
 * @ORM\Entity
 */
class Operationclassic
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idOperationClassic", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idoperationclassic;

    /**
     * @var string
     *
     * @ORM\Column(name="commission", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $commission;

    /**
     * @var string
     *
     * @ORM\Column(name="correspondant", type="string", length=254, nullable=true)
     */
    private $correspondant;

    /**
     * @var string
     *
     * @ORM\Column(name="position", type="string", length=254, nullable=true)
     */
    private $position;

    /**
     * @var string
     *
     * @ORM\Column(name="paysEnvoi", type="string", length=254, nullable=true)
     */
    private $paysenvoi;

    /**
     * @var string
     *
     * @ORM\Column(name="paysBeneficiaire", type="string", length=254, nullable=true)
     */
    private $paysbeneficiaire;

    /**
     * @var string
     *
     * @ORM\Column(name="deviseEnvoi", type="string", length=254, nullable=true)
     */
    private $deviseenvoi;

    /**
     * @var string
     *
     * @ORM\Column(name="deviseReception", type="string", length=254, nullable=true)
     */
    private $devisereception;

    /**
     * @var string
     *
     * @ORM\Column(name="pin", type="string", length=254, nullable=true)
     */
    private $pin;

    /**
     * @var string
     *
     * @ORM\Column(name="rate", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $rate;

    /**
     * @var string
     *
     * @ORM\Column(name="action", type="string", length=254, nullable=true)
     */
    private $action;

    /**
     * @var string
     *
     * @ORM\Column(name="paiement", type="string", length=254, nullable=true)
     */
    private $paiement;

    /**
     * @var string
     *
     * @ORM\Column(name="mode", type="string", length=254, nullable=true)
     */
    private $mode;

    /**
     * @var string
     *
     * @ORM\Column(name="pseudo", type="string", length=254, nullable=true)
     */
    private $pseudo;

    /**
     * @var \Operation
     *
     * @ORM\ManyToOne(targetEntity="Operation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idOperation", referencedColumnName="idOperation")
     * })
     */
    private $idoperation;

    /**
     * @var \Typeoperation
     *
     * @ORM\ManyToOne(targetEntity="Typeoperation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idTypeOperation", referencedColumnName="idTypeOperation")
     * })
     */
    private $idtypeoperation;

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
     * Get idoperationclassic
     *
     * @return integer
     */
    public function getIdoperationclassic()
    {
        return $this->idoperationclassic;
    }

    /**
     * Set commission
     *
     * @param string $commission
     *
     * @return Operationclassic
     */
    public function setCommission($commission)
    {
        $this->commission = $commission;

        return $this;
    }

    /**
     * Get commission
     *
     * @return string
     */
    public function getCommission()
    {
        return $this->commission;
    }

    /**
     * Set correspondant
     *
     * @param string $correspondant
     *
     * @return Operationclassic
     */
    public function setCorrespondant($correspondant)
    {
        $this->correspondant = $correspondant;

        return $this;
    }

    /**
     * Get correspondant
     *
     * @return string
     */
    public function getCorrespondant()
    {
        return $this->correspondant;
    }

    /**
     * Set position
     *
     * @param string $position
     *
     * @return Operationclassic
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set paysenvoi
     *
     * @param string $paysenvoi
     *
     * @return Operationclassic
     */
    public function setPaysenvoi($paysenvoi)
    {
        $this->paysenvoi = $paysenvoi;

        return $this;
    }

    /**
     * Get paysenvoi
     *
     * @return string
     */
    public function getPaysenvoi()
    {
        return $this->paysenvoi;
    }

    /**
     * Set paysbeneficiaire
     *
     * @param string $paysbeneficiaire
     *
     * @return Operationclassic
     */
    public function setPaysbeneficiaire($paysbeneficiaire)
    {
        $this->paysbeneficiaire = $paysbeneficiaire;

        return $this;
    }

    /**
     * Get paysbeneficiaire
     *
     * @return string
     */
    public function getPaysbeneficiaire()
    {
        return $this->paysbeneficiaire;
    }

    /**
     * Set deviseenvoi
     *
     * @param string $deviseenvoi
     *
     * @return Operationclassic
     */
    public function setDeviseenvoi($deviseenvoi)
    {
        $this->deviseenvoi = $deviseenvoi;

        return $this;
    }

    /**
     * Get deviseenvoi
     *
     * @return string
     */
    public function getDeviseenvoi()
    {
        return $this->deviseenvoi;
    }

    /**
     * Set devisereception
     *
     * @param string $devisereception
     *
     * @return Operationclassic
     */
    public function setDevisereception($devisereception)
    {
        $this->devisereception = $devisereception;

        return $this;
    }

    /**
     * Get devisereception
     *
     * @return string
     */
    public function getDevisereception()
    {
        return $this->devisereception;
    }

    /**
     * Set pin
     *
     * @param string $pin
     *
     * @return Operationclassic
     */
    public function setPin($pin)
    {
        $this->pin = $pin;

        return $this;
    }

    /**
     * Get pin
     *
     * @return string
     */
    public function getPin()
    {
        return $this->pin;
    }

    /**
     * Set rate
     *
     * @param string $rate
     *
     * @return Operationclassic
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get rate
     *
     * @return string
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set action
     *
     * @param string $action
     *
     * @return Operationclassic
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set paiement
     *
     * @param string $paiement
     *
     * @return Operationclassic
     */
    public function setPaiement($paiement)
    {
        $this->paiement = $paiement;

        return $this;
    }

    /**
     * Get paiement
     *
     * @return string
     */
    public function getPaiement()
    {
        return $this->paiement;
    }

    /**
     * Set mode
     *
     * @param string $mode
     *
     * @return Operationclassic
     */
    public function setMode($mode)
    {
        $this->mode = $mode;

        return $this;
    }

    /**
     * Get mode
     *
     * @return string
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * Set pseudo
     *
     * @param string $pseudo
     *
     * @return Operationclassic
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get pseudo
     *
     * @return string
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set idoperation
     *
     * @param \MyServiceBundle\Entity\Operation $idoperation
     *
     * @return Operationclassic
     */
    public function setIdoperation(\MyServiceBundle\Entity\Operation $idoperation = null)
    {
        $this->idoperation = $idoperation;

        return $this;
    }

    /**
     * Get idoperation
     *
     * @return \MyServiceBundle\Entity\Operation
     */
    public function getIdoperation()
    {
        return $this->idoperation;
    }

    /**
     * Set idtypeoperation
     *
     * @param \MyServiceBundle\Entity\Typeoperation $idtypeoperation
     *
     * @return Operationclassic
     */
    public function setIdtypeoperation(\MyServiceBundle\Entity\Typeoperation $idtypeoperation = null)
    {
        $this->idtypeoperation = $idtypeoperation;

        return $this;
    }

    /**
     * Get idtypeoperation
     *
     * @return \MyServiceBundle\Entity\Typeoperation
     */
    public function getIdtypeoperation()
    {
        return $this->idtypeoperation;
    }

    /**
     * Set idoperateur
     *
     * @param \MyServiceBundle\Entity\Ota $idoperateur
     *
     * @return Operationclassic
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
}
