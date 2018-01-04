<?php

namespace MyServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ota
 *
 * @ORM\Table(name="ota")
 * @ORM\Entity
 */
class Ota
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idOperateur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idoperateur;

    /**
     * @var string
     *
     * @ORM\Column(name="designation", type="string", length=254, nullable=true)
     */
    private $designation;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=254, nullable=true)
     */
    private $code;



    /**
     * Get idoperateur
     *
     * @return integer
     */
    public function getIdoperateur()
    {
        return $this->idoperateur;
    }

    /**
     * Set designation
     *
     * @param string $designation
     *
     * @return Ota
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
     * Set code
     *
     * @param string $code
     *
     * @return Ota
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }
}
