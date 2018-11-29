<?php

namespace PylifeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlTipoPenalizacion
 *
 * @ORM\Table(name="pl_tipo_penalizacion", indexes={@ORM\Index(name="fk_pl_user_pl_tipo_penalizacion_created_idx", columns={"pti_usr_created_by"}), @ORM\Index(name="fk_pl_user_pl_tipo_penalizacion_updated_idx", columns={"pti_usr_updated_by"})})
 * @ORM\Entity
 */
class PlTipoPenalizacion
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
     * @ORM\Column(name="pti_nombre", type="string", length=70, nullable=false)
     */
    private $ptiNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="pti_nombre_maquina", type="string", length=45, nullable=false)
     */
    private $ptiNombreMaquina;

    /**
     * @var integer
     *
     * @ORM\Column(name="pti_valor", type="integer", nullable=false)
     */
    private $ptiValor;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pti_created_at", type="datetime", nullable=false)
     */
    private $ptiCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pti_updated_at", type="datetime", nullable=true)
     */
    private $ptiUpdatedAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pti_active", type="boolean", nullable=false)
     */
    private $ptiActive = '1';

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pti_usr_created_by", referencedColumnName="id")
     * })
     */
    private $ptiUsrCreatedBy;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pti_usr_updated_by", referencedColumnName="id")
     * })
     */
    private $ptiUsrUpdatedBy;


}

