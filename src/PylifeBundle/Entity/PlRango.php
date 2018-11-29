<?php

namespace PylifeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlRango
 *
 * @ORM\Table(name="pl_rango", indexes={@ORM\Index(name="fk_pl_user_pl_rango_created_idx", columns={"ra_usr_created_by"}), @ORM\Index(name="fk_pl_user_pl_rango_updated_idx", columns={"ra_usr_updated_by"})})
 * @ORM\Entity
 */
class PlRango
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
     * @ORM\Column(name="ra_nombre", type="string", length=100, nullable=false)
     */
    private $raNombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="ra_descuento_min", type="integer", nullable=false)
     */
    private $raDescuentoMin;

    /**
     * @var integer
     *
     * @ORM\Column(name="ra_descuento_max", type="integer", nullable=false)
     */
    private $raDescuentoMax;

    /**
     * @var integer
     *
     * @ORM\Column(name="ra_puntos_min", type="integer", nullable=false)
     */
    private $raPuntosMin;

    /**
     * @var integer
     *
     * @ORM\Column(name="ra_puntos_max", type="integer", nullable=false)
     */
    private $raPuntosMax;

    /**
     * @var integer
     *
     * @ORM\Column(name="ra_cant_supervisores", type="integer", nullable=false)
     */
    private $raCantSupervisores;

    /**
     * @var integer
     *
     * @ORM\Column(name="ra_posicion", type="integer", nullable=false)
     */
    private $raPosicion;

    /**
     * @var integer
     *
     * @ORM\Column(name="ra_tiempo_consecutivo", type="integer", nullable=false)
     */
    private $raTiempoConsecutivo;

    /**
     * @var integer
     *
     * @ORM\Column(name="ra_tipo_tiempo", type="integer", nullable=false)
     */
    private $raTipoTiempo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ra_created_at", type="datetime", nullable=false)
     */
    private $raCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ra_updated_at", type="datetime", nullable=true)
     */
    private $raUpdatedAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ra_active", type="boolean", nullable=false)
     */
    private $raActive = '1';

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ra_usr_created_by", referencedColumnName="id")
     * })
     */
    private $raUsrCreatedBy;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ra_usr_updated_by", referencedColumnName="id")
     * })
     */
    private $raUsrUpdatedBy;


}

