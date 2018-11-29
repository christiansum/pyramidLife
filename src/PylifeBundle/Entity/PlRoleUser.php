<?php

namespace PylifeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlRoleUser
 *
 * @ORM\Table(name="pl_role_user", indexes={@ORM\Index(name="fk_pl_user_pl_role_idx", columns={"ru_usr_id"}), @ORM\Index(name="fk_pl_role_pl_role_user_idx", columns={"ru_rol_id"}), @ORM\Index(name="fk_pl_user_pl_role_user_created_idx", columns={"ru_usr_created_by"}), @ORM\Index(name="fk_pl_user_pl_role_user_updated_idx", columns={"ru_usr_updated_by"})})
 * @ORM\Entity
 */
class PlRoleUser
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
     * @var \DateTime
     *
     * @ORM\Column(name="ru_created_at", type="datetime", nullable=false)
     */
    private $ruCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ru_updated_at", type="datetime", nullable=true)
     */
    private $ruUpdatedAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ru_active", type="boolean", nullable=false)
     */
    private $ruActive = '1';

    /**
     * @var \PylifeBundle\Entity\PlRole
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlRole")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ru_rol_id", referencedColumnName="id")
     * })
     */
    private $ruRol;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ru_usr_id", referencedColumnName="id")
     * })
     */
    private $ruUsr;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ru_usr_created_by", referencedColumnName="id")
     * })
     */
    private $ruUsrCreatedBy;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ru_usr_updated_by", referencedColumnName="id")
     * })
     */
    private $ruUsrUpdatedBy;


}

