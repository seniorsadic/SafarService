<?php

namespace MyServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Typeoperation
 *
 * @ORM\Table(name="typeoperation")
 * @ORM\Entity
 */
class Typeoperation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idTypeOperation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtypeoperation;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=254, nullable=true)
     */
    private $type;



    /**
     * Get idtypeoperation
     *
     * @return integer
     */
    public function getIdtypeoperation()
    {
        return $this->idtypeoperation;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Typeoperation
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
