<?php

namespace PylifeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlPosicion
 *
 * @ORM\Table(name="pl_posicion", indexes={@ORM\Index(name="fk_pl_premio_pl_posicion_idx", columns={"pos_pre_id"}), @ORM\Index(name="fk_pl_periodo_premio_pl_posicion_idx", columns={"pos_pp_id"}), @ORM\Index(name="fk_pl_moneda_pl_posicion_idx", columns={"pos_mon_id"}), @ORM\Index(name="fk_pl_user_pl_posicion_created_idx", columns={"pos_usr_created_by"}), @ORM\Index(name="fk_pl_user_pl_posicion_updated_idx", columns={"pos_usr_updated_by"})})
 * @ORM\Entity
 */
class PlPosicion
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
     * @ORM\Column(name="pos_nombre", type="string", length=80, nullable=false)
     */
    private $posNombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="pos_puntos", type="integer", nullable=true)
     */
    private $posPuntos;

    /**
     * @var float
     *
     * @ORM\Column(name="pos_ventas", type="float", precision=10, scale=0, nullable=true)
     */
    private $posVentas;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pos_created_at", type="datetime", nullable=false)
     */
    private $posCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pos_updated_at", type="datetime", nullable=true)
     */
    private $posUpdatedAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pos_active", type="boolean", nullable=false)
     */
    private $posActive = '1';

    /**
     * @var \PylifeBundle\Entity\PlMoneda
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlMoneda")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pos_mon_id", referencedColumnName="id")
     * })
     */
    private $posMon;

    /**
     * @var \PylifeBundle\Entity\PlPeriodoPremio
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlPeriodoPremio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pos_pp_id", referencedColumnName="id")
     * })
     */
    private $posPp;

    /**
     * @var \PylifeBundle\Entity\PlPremio
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlPremio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pos_pre_id", referencedColumnName="id")
     * })
     */
    private $posPre;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pos_usr_created_by", referencedColumnName="id")
     * })
     */
    private $posUsrCreatedBy;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pos_usr_updated_by", referencedColumnName="id")
     * })
     */
    private $posUsrUpdatedBy;


}

