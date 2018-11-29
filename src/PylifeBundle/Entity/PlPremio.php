<?php

namespace PylifeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlPremio
 *
 * @ORM\Table(name="pl_premio", indexes={@ORM\Index(name="fk_pl_pais_pl_premio_idx", columns={"pre_pa_id"}), @ORM\Index(name="fk_pl_user_pl_premio_created_idx", columns={"pre_usr_created_by"}), @ORM\Index(name="fk_pl_user_pl_premio_updated_idx", columns={"pre_usr_updated_by"})})
 * @ORM\Entity
 */
class PlPremio
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
     * @ORM\Column(name="pre_nombre", type="string", length=60, nullable=true)
     */
    private $preNombre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pre_created_at", type="datetime", nullable=false)
     */
    private $preCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pre_updated_at", type="datetime", nullable=true)
     */
    private $preUpdatedAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pre_active", type="boolean", nullable=false)
     */
    private $preActive;

    /**
     * @var \PylifeBundle\Entity\PlPais
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlPais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pre_pa_id", referencedColumnName="id")
     * })
     */
    private $prePa;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pre_usr_created_by", referencedColumnName="id")
     * })
     */
    private $preUsrCreatedBy;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pre_usr_updated_by", referencedColumnName="id")
     * })
     */
    private $preUsrUpdatedBy;


}

