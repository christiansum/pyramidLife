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



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set vdCantidadVendida
     *
     * @param integer $vdCantidadVendida
     *
     * @return PlVentaDetalle
     */
    public function setVdCantidadVendida($vdCantidadVendida)
    {
        $this->vdCantidadVendida = $vdCantidadVendida;

        return $this;
    }

    /**
     * Get vdCantidadVendida
     *
     * @return integer
     */
    public function getVdCantidadVendida()
    {
        return $this->vdCantidadVendida;
    }

    /**
     * Set vdSumaPuntos
     *
     * @param integer $vdSumaPuntos
     *
     * @return PlVentaDetalle
     */
    public function setVdSumaPuntos($vdSumaPuntos)
    {
        $this->vdSumaPuntos = $vdSumaPuntos;

        return $this;
    }

    /**
     * Get vdSumaPuntos
     *
     * @return integer
     */
    public function getVdSumaPuntos()
    {
        return $this->vdSumaPuntos;
    }

    /**
     * Set vdCreatedAt
     *
     * @param \DateTime $vdCreatedAt
     *
     * @return PlVentaDetalle
     */
    public function setVdCreatedAt($vdCreatedAt)
    {
        $this->vdCreatedAt = $vdCreatedAt;

        return $this;
    }

    /**
     * Get vdCreatedAt
     *
     * @return \DateTime
     */
    public function getVdCreatedAt()
    {
        return $this->vdCreatedAt;
    }

    /**
     * Set vdUpdatedAt
     *
     * @param \DateTime $vdUpdatedAt
     *
     * @return PlVentaDetalle
     */
    public function setVdUpdatedAt($vdUpdatedAt)
    {
        $this->vdUpdatedAt = $vdUpdatedAt;

        return $this;
    }

    /**
     * Get vdUpdatedAt
     *
     * @return \DateTime
     */
    public function getVdUpdatedAt()
    {
        return $this->vdUpdatedAt;
    }

    /**
     * Set vdActive
     *
     * @param boolean $vdActive
     *
     * @return PlVentaDetalle
     */
    public function setVdActive($vdActive)
    {
        $this->vdActive = $vdActive;

        return $this;
    }

    /**
     * Get vdActive
     *
     * @return boolean
     */
    public function getVdActive()
    {
        return $this->vdActive;
    }

    /**
     * Set vdInv
     *
     * @param \PylifeBundle\Entity\PlInventario $vdInv
     *
     * @return PlVentaDetalle
     */
    public function setVdInv(\PylifeBundle\Entity\PlInventario $vdInv = null)
    {
        $this->vdInv = $vdInv;

        return $this;
    }

    /**
     * Get vdInv
     *
     * @return \PylifeBundle\Entity\PlInventario
     */
    public function getVdInv()
    {
        return $this->vdInv;
    }

    /**
     * Set vdUsrCreatedBy
     *
     * @param \PylifeBundle\Entity\PlUser $vdUsrCreatedBy
     *
     * @return PlVentaDetalle
     */
    public function setVdUsrCreatedBy(\PylifeBundle\Entity\PlUser $vdUsrCreatedBy = null)
    {
        $this->vdUsrCreatedBy = $vdUsrCreatedBy;

        return $this;
    }

    /**
     * Get vdUsrCreatedBy
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getVdUsrCreatedBy()
    {
        return $this->vdUsrCreatedBy;
    }

    /**
     * Set vdUsrUpdatedBy
     *
     * @param \PylifeBundle\Entity\PlUser $vdUsrUpdatedBy
     *
     * @return PlVentaDetalle
     */
    public function setVdUsrUpdatedBy(\PylifeBundle\Entity\PlUser $vdUsrUpdatedBy = null)
    {
        $this->vdUsrUpdatedBy = $vdUsrUpdatedBy;

        return $this;
    }

    /**
     * Get vdUsrUpdatedBy
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getVdUsrUpdatedBy()
    {
        return $this->vdUsrUpdatedBy;
    }

    /**
     * Set vdVen
     *
     * @param \PylifeBundle\Entity\PlVenta $vdVen
     *
     * @return PlVentaDetalle
     */
    public function setVdVen(\PylifeBundle\Entity\PlVenta $vdVen = null)
    {
        $this->vdVen = $vdVen;

        return $this;
    }

    /**
     * Get vdVen
     *
     * @return \PylifeBundle\Entity\PlVenta
     */
    public function getVdVen()
    {
        return $this->vdVen;
    }
}
