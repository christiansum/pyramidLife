<?php

namespace PylifeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlHistorialRango
 *
 * @ORM\Table(name="pl_historial_rango", indexes={@ORM\Index(name="fk_pl_user_pl_historial_rango_idx", columns={"hira_usr_id"}), @ORM\Index(name="fk_pl_rango_pl_historial_rango_old_idx", columns={"hira_ra_id_anterior"}), @ORM\Index(name="fk_pl_rango_pl_historial_rango_new_idx", columns={"hira_ra_id_nuevo"}), @ORM\Index(name="fk_pl_user_pl_historial_rango_created_idx", columns={"hira_usr_created_by"}), @ORM\Index(name="fk_pl_user_pl_historial_rango_updated_idx", columns={"hira_usr_updated_by"})})
 * @ORM\Entity
 */
class PlHistorialRango
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
     * @ORM\Column(name="hira_created_at", type="datetime", nullable=false)
     */
    private $hiraCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hira_updated_at", type="datetime", nullable=true)
     */
    private $hiraUpdatedAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="hira_active", type="boolean", nullable=false)
     */
    private $hiraActive = '1';

    /**
     * @var \PylifeBundle\Entity\PlRango
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlRango")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="hira_ra_id_nuevo", referencedColumnName="id")
     * })
     */
    private $hiraRaNuevo;

    /**
     * @var \PylifeBundle\Entity\PlRango
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlRango")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="hira_ra_id_anterior", referencedColumnName="id")
     * })
     */
    private $hiraRaAnterior;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="hira_usr_id", referencedColumnName="id")
     * })
     */
    private $hiraUsr;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="hira_usr_created_by", referencedColumnName="id")
     * })
     */
    private $hiraUsrCreatedBy;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="hira_usr_updated_by", referencedColumnName="id")
     * })
     */
    private $hiraUsrUpdatedBy;


}

