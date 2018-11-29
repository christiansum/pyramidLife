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
    private $invActive = '1';

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


}

