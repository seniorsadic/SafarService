<?php

namespace MyServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Roleutilisateur
 *
 * @ORM\Table(name="roleutilisateur", indexes={@ORM\Index(name="FK_Association_12", columns={"idRole"}), @ORM\Index(name="FK_Association_112", columns={"idUser"})})
 * @ORM\Entity
 */
class Roleutilisateur
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idRoleUser", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idroleuser;

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
     * @var \Role
     *
     * @ORM\ManyToOne(targetEntity="Role")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idRole", referencedColumnName="idRole")
     * })
     */
    private $idrole;



    /**
     * Get idroleuser
     *
     * @return integer
     */
    public function getIdroleuser()
    {
        return $this->idroleuser;
    }

    /**
     * Set iduser
     *
     * @param \MyServiceBundle\Entity\Utilisateur $iduser
     *
     * @return Roleutilisateur
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

    /**
     * Set idrole
     *
     * @param \MyServiceBundle\Entity\Role $idrole
     *
     * @return Roleutilisateur
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
}
