<?php

namespace MyServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Guichet
 *
 * @ORM\Table(name="guichet", indexes={@ORM\Index(name="FK_Association_9", columns={"idAgence"})})
 * @ORM\Entity
 */
class Guichet
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idGuichet", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idguichet;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer", nullable=true)
     */
    private $numero;

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
     * Get idguichet
     *
     * @return integer
     */
    public function getIdguichet()
    {
        return $this->idguichet;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     *
     * @return Guichet
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set idagence
     *
     * @param \MyServiceBundle\Entity\Agence $idagence
     *
     * @return Guichet
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
