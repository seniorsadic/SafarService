<?php

namespace MyServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vente
 *
 * @ORM\Table(name="vente", indexes={@ORM\Index(name="FK_Generalisation_2", columns={"idOperation"})})
 * @ORM\Entity
 */
class Vente
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idVente", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idvente;

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
     * Get idvente
     *
     * @return integer
     */
    public function getIdvente()
    {
        return $this->idvente;
    }

    /**
     * Set idoperation
     *
     * @param \MyServiceBundle\Entity\Operation $idoperation
     *
     * @return Vente
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
}
