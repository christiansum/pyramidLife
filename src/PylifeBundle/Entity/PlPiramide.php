<?php

namespace PylifeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlPiramide
 *
 * @ORM\Table(name="pl_piramide", indexes={@ORM\Index(name="fk_pl_user_pl_piramide_child_idx", columns={"py_usr_id_child"}), @ORM\Index(name="fk_pl_user_pl_piramide_parent_idx", columns={"py_usr_id_parent"}), @ORM\Index(name="fk_pl_user_pl_piramide_created_idx", columns={"py_usr_created_by"}), @ORM\Index(name="fk_pl_user_pl_piramide_updated_idx", columns={"py_usr_updated_by"})})
 * @ORM\Entity
 */
class PlPiramide
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
     * @ORM\Column(name="py_created_at", type="datetime", nullable=false)
     */
    private $pyCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="py_updated_at", type="datetime", nullable=true)
     */
    private $pyUpdatedAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="py_active", type="boolean", nullable=false)
     */
    private $pyActive;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="py_usr_id_child", referencedColumnName="id")
     * })
     */
    private $pyUsrChild;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="py_usr_created_by", referencedColumnName="id")
     * })
     */
    private $pyUsrCreatedBy;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="py_usr_id_parent", referencedColumnName="id")
     * })
     */
    private $pyUsrParent;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="py_usr_updated_by", referencedColumnName="id")
     * })
     */
    private $pyUsrUpdatedBy;


}

