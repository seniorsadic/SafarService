<?php

namespace MyServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Roleprivilege
 *
 * @ORM\Table(name="roleprivilege", indexes={@ORM\Index(name="FK_Association_13", columns={"idPrivilege"}), @ORM\Index(name="FK_Association_123", columns={"idRole"})})
 * @ORM\Entity
 */
class Roleprivilege
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idPrivilegeRole", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idprivilegerole;

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
     * @var \Privilege
     *
     * @ORM\ManyToOne(targetEntity="Privilege")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idPrivilege", referencedColumnName="idPrivilege")
     * })
     */
    private $idprivilege;



    /**
     * Get idprivilegerole
     *
     * @return integer
     */
    public function getIdprivilegerole()
    {
        return $this->idprivilegerole;
    }

    /**
     * Set idrole
     *
     * @param \MyServiceBundle\Entity\Role $idrole
     *
     * @return Roleprivilege
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
     * Set idprivilege
     *
     * @param \MyServiceBundle\Entity\Privilege $idprivilege
     *
     * @return Roleprivilege
     */
    public function setIdprivilege(\MyServiceBundle\Entity\Privilege $idprivilege = null)
    {
        $this->idprivilege = $idprivilege;

        return $this;
    }

    /**
     * Get idprivilege
     *
     * @return \MyServiceBundle\Entity\Privilege
     */
    public function getIdprivilege()
    {
        return $this->idprivilege;
    }
}
