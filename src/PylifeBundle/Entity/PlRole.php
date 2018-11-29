<?php

namespace PylifeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlRole
 *
 * @ORM\Table(name="pl_role", indexes={@ORM\Index(name="fk_pl_user_pl_role_created_idx", columns={"rol_usr_created_by"}), @ORM\Index(name="fk_pl_user_pl_role_updated_idx", columns={"rol_usr_updated_by"})})
 * @ORM\Entity
 */
class PlRole
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="rol_nombre", type="string", length=70, nullable=false)
     */
    private $rolNombre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rol_created_at", type="datetime", nullable=false)
     */
    private $rolCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rol_updated_at", type="datetime", nullable=true)
     */
    private $rolUpdatedAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="rol_active", type="boolean", nullable=false)
     */
    private $rolActive = '1';

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="rol_usr_created_by", referencedColumnName="id")
     * })
     */
    private $rolUsrCreatedBy;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="rol_usr_updated_by", referencedColumnName="id")
     * })
     */
    private $rolUsrUpdatedBy;


}

