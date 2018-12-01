<?php

namespace PylifeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlInventario
 *
 * @ORM\Table(name="pl_inventario", indexes={@ORM\Index(name="fk_pl_producto_pl_inventario_idx", columns={"inv_pro_id"}), @ORM\Index(name="fk_pl_user_pl_inventario_updated_idx", columns={"inv_usr_updated_by"}), @ORM\Index(name="fk_pl_user_pl_inventario_created_idx", columns={"inv_usr_created_by"})})
 * @ORM\Entity
 */
class PlInventario
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
     * @ORM\Column(name="inv_cantidad", type="integer", nullable=false)
     */
    private $invCantidad;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="inv_fecha_vencimiento", type="datetime", nullable=false)
     */
    private $invFechaVencimiento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="inv_created_at", type="datetime", nullable=false)
     */
    private $invCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="inv_updated_at", type="datetime", nullable=true)
     */
    private $invUpdatedAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="inv_active", type="boolean", nullable=false)
     */
    private $invActive = true;

    /**
     * @var \PylifeBundle\Entity\PlProducto
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlProducto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="inv_pro_id", referencedColumnName="id")
     * })
     */
    private $invPro;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="inv_usr_created_by", referencedColumnName="id")
     * })
     */
    private $invUsrCreatedBy;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="inv_usr_updated_by", referencedColumnName="id")
     * })
     */
    private $invUsrUpdatedBy;



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
     * Set invCantidad
     *
     * @param integer $invCantidad
     *
     * @return PlInventario
     */
    public function setInvCantidad($invCantidad)
    {
        $this->invCantidad = $invCantidad;

        return $this;
    }

    /**
     * Get invCantidad
     *
     * @return integer
     */
    public function getInvCantidad()
    {
        return $this->invCantidad;
    }

    /**
     * Set invFechaVencimiento
     *
     * @param \DateTime $invFechaVencimiento
     *
     * @return PlInventario
     */
    public function setInvFechaVencimiento($invFechaVencimiento)
    {
        $this->invFechaVencimiento = $invFechaVencimiento;

        return $this;
    }

    /**
     * Get invFechaVencimiento
     *
     * @return \DateTime
     */
    public function getInvFechaVencimiento()
    {
        return $this->invFechaVencimiento;
    }

    /**
     * Set invCreatedAt
     *
     * @param \DateTime $invCreatedAt
     *
     * @return PlInventario
     */
    public function setInvCreatedAt($invCreatedAt)
    {
        $this->invCreatedAt = $invCreatedAt;

        return $this;
    }

    /**
     * Get invCreatedAt
     *
     * @return \DateTime
     */
    public function getInvCreatedAt()
    {
        return $this->invCreatedAt;
    }

    /**
     * Set invUpdatedAt
     *
     * @param \DateTime $invUpdatedAt
     *
     * @return PlInventario
     */
    public function setInvUpdatedAt($invUpdatedAt)
    {
        $this->invUpdatedAt = $invUpdatedAt;

        return $this;
    }

    /**
     * Get invUpdatedAt
     *
     * @return \DateTime
     */
    public function getInvUpdatedAt()
    {
        return $this->invUpdatedAt;
    }

    /**
     * Set invActive
     *
     * @param boolean $invActive
     *
     * @return PlInventario
     */
    public function setInvActive($invActive)
    {
        $this->invActive = $invActive;

        return $this;
    }

    /**
     * Get invActive
     *
     * @return boolean
     */
    public function getInvActive()
    {
        return $this->invActive;
    }

    /**
     * Set invPro
     *
     * @param \PylifeBundle\Entity\PlProducto $invPro
     *
     * @return PlInventario
     */
    public function setInvPro(\PylifeBundle\Entity\PlProducto $invPro = null)
    {
        $this->invPro = $invPro;

        return $this;
    }

    /**
     * Get invPro
     *
     * @return \PylifeBundle\Entity\PlProducto
     */
    public function getInvPro()
    {
        return $this->invPro;
    }

    /**
     * Set invUsrCreatedBy
     *
     * @param \PylifeBundle\Entity\PlUser $invUsrCreatedBy
     *
     * @return PlInventario
     */
    public function setInvUsrCreatedBy(\PylifeBundle\Entity\PlUser $invUsrCreatedBy = null)
    {
        $this->invUsrCreatedBy = $invUsrCreatedBy;

        return $this;
    }

    /**
     * Get invUsrCreatedBy
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getInvUsrCreatedBy()
    {
        return $this->invUsrCreatedBy;
    }

    /**
     * Set invUsrUpdatedBy
     *
     * @param \PylifeBundle\Entity\PlUser $invUsrUpdatedBy
     *
     * @return PlInventario
     */
    public function setInvUsrUpdatedBy(\PylifeBundle\Entity\PlUser $invUsrUpdatedBy = null)
    {
        $this->invUsrUpdatedBy = $invUsrUpdatedBy;

        return $this;
    }

    /**
     * Get invUsrUpdatedBy
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getInvUsrUpdatedBy()
    {
        return $this->invUsrUpdatedBy;
    }
}
