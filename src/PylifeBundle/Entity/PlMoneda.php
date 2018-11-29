<?php

namespace PylifeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlMoneda
 *
 * @ORM\Table(name="pl_moneda", indexes={@ORM\Index(name="fk_pl_user_pl_moneda_created_idx", columns={"mo_usr_created_by"}), @ORM\Index(name="fk_pl_user_pl_moneda_updated_idx", columns={"mo_usr_updated_by"})})
 * @ORM\Entity
 */
class PlMoneda
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
     * @ORM\Column(name="mo_nombre", type="string", length=70, nullable=false)
     */
    private $moNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="mo_simbolo", type="string", length=10, nullable=false)
     */
    private $moSimbolo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="mo_created_at", type="datetime", nullable=false)
     */
    private $moCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="mo_updated_at", type="datetime", nullable=true)
     */
    private $moUpdatedAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="mo_active", type="boolean", nullable=false)
     */
    private $moActive = '1';

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mo_usr_created_by", referencedColumnName="id")
     * })
     */
    private $moUsrCreatedBy;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mo_usr_updated_by", referencedColumnName="id")
     * })
     */
    private $moUsrUpdatedBy;


}

