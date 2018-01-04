<?php

namespace MyServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Agence
 *
 * @ORM\Table(name="agence", indexes={@ORM\Index(name="FK_Association_8", columns={"idVille"})})
 * @ORM\Entity
 */
class Agence
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idAgence", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idagence;

    /**
     * @var string
     *
     * @ORM\Column(name="designation", type="string", length=254, nullable=true)
     */
    private $designation;

    /**
     * @var \Ville
     *
     * @ORM\ManyToOne(targetEntity="Ville")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idVille", referencedColumnName="idVille")
     * })
     */
    private $idville;



    /**
     * Get idagence
     *
     * @return integer
     */
    public function getIdagence()
    {
        return $this->idagence;
    }

    /**
     * Set designation
     *
     * @param string $designation
     *
     * @return Agence
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
     * Set idville
     *
     * @param \MyServiceBundle\Entity\Ville $idville
     *
     * @return Agence
     */
    public function setIdville(\MyServiceBundle\Entity\Ville $idville = null)
    {
        $this->idville = $idville;

        return $this;
    }

    /**
     * Get idville
     *
     * @return \MyServiceBundle\Entity\Ville
     */
    public function getIdville()
    {
        return $this->idville;
    }
}
