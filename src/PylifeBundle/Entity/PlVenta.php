<?php

namespace PylifeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlVenta
 *
 * @ORM\Table(name="pl_venta", indexes={@ORM\Index(name="fk_pl_user_pl_venta_idx", columns={"ven_usr_id"}), @ORM\Index(name="fk_pl_pais_pl_venta_idx", columns={"ven_pa_id"}), @ORM\Index(name="fk_pl_user_pl_venta_created_idx", columns={"ven_usr_created_by"}), @ORM\Index(name="fk_pl_user_pl_venta_updated_idx", columns={"ven_usr_updated_by"})})
 * @ORM\Entity
 */
class PlVenta
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
     * @ORM\Column(name="ven_created_at", type="datetime", nullable=false)
     */
    private $venCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ven_updated_at", type="datetime", nullable=true)
     */
    private $venUpdatedAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ven_active", type="boolean", nullable=false)
     */
    private $venActive = '1';

    /**
     * @var \PylifeBundle\Entity\PlPais
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlPais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ven_pa_id", referencedColumnName="id")
     * })
     */
    private $venPa;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ven_usr_id", referencedColumnName="id")
     * })
     */
    private $venUsr;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ven_usr_created_by", referencedColumnName="id")
     * })
     */
    private $venUsrCreatedBy;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ven_usr_updated_by", referencedColumnName="id")
     * })
     */
    private $venUsrUpdatedBy;


}

