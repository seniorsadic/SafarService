<?php

namespace MyServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Privilege
 *
 * @ORM\Table(name="privilege")
 * @ORM\Entity
 */
class Privilege
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idPrivilege", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idprivilege;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=254, nullable=true)
     */
    private $nom;



    /**
     * Get idprivilege
     *
     * @return integer
     */
    public function getIdprivilege()
    {
        return $this->idprivilege;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Privilege
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
}
