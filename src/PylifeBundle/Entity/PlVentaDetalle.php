<?php

namespace PylifeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlVentaDetalle
 *
 * @ORM\Table(name="pl_venta_detalle", indexes={@ORM\Index(name="fk_pl_inventario_pl_venta_detalle_idx", columns={"vd_id_inv"}), @ORM\Index(name="fk_pl_venta_pl_venta_detalle_idx", columns={"vd_id_ven"}), @ORM\Index(name="fk_pl_user_pl_venta_detalle_created_idx", columns={"vd_usr_created_by"}), @ORM\Index(name="fk_pl_user_pl_venta_detalle_updated_idx", columns={"vd_usr_updated_by"})})
 * @ORM\Entity
 */
class PlVentaDetalle
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
     * @var integer
     *
     * @ORM\Column(name="vd_cantidad_vendida", type="integer", nullable=false)
     */
    private $vdCantidadVendida;

    /**
     * @var integer
     *
     * @ORM\Column(name="vd_suma_puntos", type="integer", nullable=false)
     */
    private $vdSumaPuntos;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="vd_created_at", type="datetime", nullable=false)
     */
    private $vdCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="vd_updated_at", type="datetime", nullable=true)
     */
    private $vdUpdatedAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="vd_active", type="boolean", nullable=false)
     */
    private $vdActive = '1';

    /**
     * @var \PylifeBundle\Entity\PlInventario
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlInventario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="vd_id_inv", referencedColumnName="id")
     * })
     */
    private $vdInv;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="vd_usr_created_by", referencedColumnName="id")
     * })
     */
    private $vdUsrCreatedBy;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="vd_usr_updated_by", referencedColumnName="id")
     * })
     */
    private $vdUsrUpdatedBy;

    /**
     * @var \PylifeBundle\Entity\PlVenta
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlVenta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="vd_id_ven", referencedColumnName="id")
     * })
     */
    private $vdVen;


}

