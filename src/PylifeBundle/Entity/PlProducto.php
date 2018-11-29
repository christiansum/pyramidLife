<?php

namespace PylifeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlProducto
 *
 * @ORM\Table(name="pl_producto", indexes={@ORM\Index(name="fk_pl_pais_pl_producto_idx", columns={"pro_pa_id"}), @ORM\Index(name="fk_pl_moneda_pl_producto_idx", columns={"pro_mo_id"}), @ORM\Index(name="fk_pl_user_pl_producto_created_idx", columns={"pro_usr_created_by"}), @ORM\Index(name="fk_pl_user_pl_producto_updated_idx", columns={"pro_usr_updated_by"})})
 * @ORM\Entity
 */
class PlProducto
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
     * @ORM\Column(name="pro_nombre", type="string", length=100, nullable=false)
     */
    private $proNombre;

    /**
     * @var float
     *
     * @ORM\Column(name="pro_precio", type="float", precision=10, scale=0, nullable=false)
     */
    private $proPrecio;

    /**
     * @var integer
     *
     * @ORM\Column(name="pro_puntos", type="integer", nullable=false)
     */
    private $proPuntos;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pro_created_at", type="datetime", nullable=false)
     */
    private $proCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pro_updated_at", type="datetime", nullable=true)
     */
    private $proUpdatedAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pro_active", type="boolean", nullable=false)
     */
    private $proActive = '1';

    /**
     * @var \PylifeBundle\Entity\PlMoneda
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlMoneda")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pro_mo_id", referencedColumnName="id")
     * })
     */
    private $proMo;

    /**
     * @var \PylifeBundle\Entity\PlPais
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlPais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pro_pa_id", referencedColumnName="id")
     * })
     */
    private $proPa;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pro_usr_created_by", referencedColumnName="id")
     * })
     */
    private $proUsrCreatedBy;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pro_usr_updated_by", referencedColumnName="id")
     * })
     */
    private $proUsrUpdatedBy;


}

