<?php

namespace PylifeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlPenalizacion
 *
 * @ORM\Table(name="pl_penalizacion", indexes={@ORM\Index(name="fk_pl_user_pl_penalizacion_idx", columns={"pna_usr_id"}), @ORM\Index(name="fk_pl_user_pl_penalizacion_created_idx", columns={"pna_usr_created_by"}), @ORM\Index(name="fk_pl_user_pl_penalizacion_updated_idx", columns={"pna_usr_updated_by"}), @ORM\Index(name="fk_pl_tipo_penalizacion_pl_penalizacion_idx", columns={"pna_pti_id"})})
 * @ORM\Entity
 */
class PlPenalizacion
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
     * @ORM\Column(name="pna_tiempo_inicio", type="date", nullable=false)
     */
    private $pnaTiempoInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pna_tiempo_fin", type="date", nullable=false)
     */
    private $pnaTiempoFin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pna_created_at", type="datetime", nullable=false)
     */
    private $pnaCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pna_updated_at", type="datetime", nullable=true)
     */
    private $pnaUpdatedAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pna_active", type="boolean", nullable=false)
     */
    private $pnaActive = '1';

    /**
     * @var \PylifeBundle\Entity\PlTipoPenalizacion
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlTipoPenalizacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pna_pti_id", referencedColumnName="id")
     * })
     */
    private $pnaPti;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pna_usr_id", referencedColumnName="id")
     * })
     */
    private $pnaUsr;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pna_usr_created_by", referencedColumnName="id")
     * })
     */
    private $pnaUsrCreatedBy;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pna_usr_updated_by", referencedColumnName="id")
     * })
     */
    private $pnaUsrUpdatedBy;


}

