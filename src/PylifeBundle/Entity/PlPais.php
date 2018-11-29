<?php

namespace PylifeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlPais
 *
 * @ORM\Table(name="pl_pais", indexes={@ORM\Index(name="fk_pl_user_pl_pais_created_idx", columns={"pa_usr_created_by"}), @ORM\Index(name="fk_pl_user_pl_pais_updated_idx", columns={"pa_usr_updated_by"})})
 * @ORM\Entity
 */
class PlPais
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
     * @ORM\Column(name="pa_nombre", type="string", length=50, nullable=false)
     */
    private $paNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="pa_codigo_area", type="string", length=10, nullable=false)
     */
    private $paCodigoArea;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pa_created_at", type="datetime", nullable=false)
     */
    private $paCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pa_updated_at", type="datetime", nullable=true)
     */
    private $paUpdatedAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pa_active", type="boolean", nullable=false)
     */
    private $paActive = '1';

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pa_usr_created_by", referencedColumnName="id")
     * })
     */
    private $paUsrCreatedBy;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pa_usr_updated_by", referencedColumnName="id")
     * })
     */
    private $paUsrUpdatedBy;


}

