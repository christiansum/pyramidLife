<?php

namespace PylifeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlPeriodoPremio
 *
 * @ORM\Table(name="pl_periodo_premio", indexes={@ORM\Index(name="fk_pl_user_pl_periodo_premio_created_idx", columns={"pp_usr_created_by"}), @ORM\Index(name="fk_pl_user_pl_periodo_premio_updated_idx", columns={"pp_usr_updated_by"})})
 * @ORM\Entity
 */
class PlPeriodoPremio
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
     * @ORM\Column(name="pp_nombre", type="string", length=150, nullable=false)
     */
    private $ppNombre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pp_fecha_inicial", type="date", nullable=false)
     */
    private $ppFechaInicial;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pp_fecha_final", type="date", nullable=false)
     */
    private $ppFechaFinal;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pp_created_at", type="datetime", nullable=false)
     */
    private $ppCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pp_updated_at", type="datetime", nullable=true)
     */
    private $ppUpdatedAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pp_active", type="boolean", nullable=false)
     */
    private $ppActive = '1';

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pp_usr_created_by", referencedColumnName="id")
     * })
     */
    private $ppUsrCreatedBy;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pp_usr_updated_by", referencedColumnName="id")
     * })
     */
    private $ppUsrUpdatedBy;


}

