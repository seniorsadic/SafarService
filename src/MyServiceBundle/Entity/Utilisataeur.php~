<?php

namespace MyServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisataeur
 *
 * @ORM\Table(name="utilisataeur", indexes={@ORM\Index(name="FK_Association_12", columns={"idRole"}), @ORM\Index(name="FK_Association_2", columns={"idAgence"})})
 * @ORM\Entity
 */
class Utilisataeur
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idUser", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iduser;

    /**
     * @var string
     *
     * @ORM\Column(name="numero", type="string", length=254, nullable=true)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=254, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenoms", type="string", length=254, nullable=true)
     */
    private $prenoms;

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
     * @var \Role
     *
     * @ORM\ManyToOne(targetEntity="Role")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idRole", referencedColumnName="idRole")
     * })
     */
    private $idrole;



    /**
     * Set numero
     *
     * @param string $numero
     *
     * @return Utilisataeur
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Utilisataeur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenoms
     *
     * @param string $prenoms
     *
     * @return Utilisataeur
     */
    public function setPrenoms($prenoms)
    {
        $this->prenoms = $prenoms;

        return $this;
    }

    /**
     * Get prenoms
     *
     * @return string
     */
    public function getPrenoms()
    {
        return $this->prenoms;
    }

    /**
     * Get iduser
     *
     * @return integer
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * Set idrole
     *
     * @param \MyServiceBundle\Entity\Role $idrole
     *
     * @return Utilisataeur
     */
    public function setIdrole(\MyServiceBundle\Entity\Role $idrole = null)
    {
        $this->idrole = $idrole;

        return $this;
    }

    /**
     * Get idrole
     *
     * @return \MyServiceBundle\Entity\Role
     */
    public function getIdrole()
    {
        return $this->idrole;
    }

    /**
     * Set idagence
     *
     * @param \MyServiceBundle\Entity\Agence $idagence
     *
     * @return Utilisataeur
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
