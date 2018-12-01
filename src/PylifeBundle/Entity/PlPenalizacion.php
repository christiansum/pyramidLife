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
     * Set pnaTiempoInicio
     *
     * @param \DateTime $pnaTiempoInicio
     *
     * @return PlPenalizacion
     */
    public function setPnaTiempoInicio($pnaTiempoInicio)
    {
        $this->pnaTiempoInicio = $pnaTiempoInicio;

        return $this;
    }

    /**
     * Get pnaTiempoInicio
     *
     * @return \DateTime
     */
    public function getPnaTiempoInicio()
    {
        return $this->pnaTiempoInicio;
    }

    /**
     * Set pnaTiempoFin
     *
     * @param \DateTime $pnaTiempoFin
     *
     * @return PlPenalizacion
     */
    public function setPnaTiempoFin($pnaTiempoFin)
    {
        $this->pnaTiempoFin = $pnaTiempoFin;

        return $this;
    }

    /**
     * Get pnaTiempoFin
     *
     * @return \DateTime
     */
    public function getPnaTiempoFin()
    {
        return $this->pnaTiempoFin;
    }

    /**
     * Set pnaCreatedAt
     *
     * @param \DateTime $pnaCreatedAt
     *
     * @return PlPenalizacion
     */
    public function setPnaCreatedAt($pnaCreatedAt)
    {
        $this->pnaCreatedAt = $pnaCreatedAt;

        return $this;
    }

    /**
     * Get pnaCreatedAt
     *
     * @return \DateTime
     */
    public function getPnaCreatedAt()
    {
        return $this->pnaCreatedAt;
    }

    /**
     * Set pnaUpdatedAt
     *
     * @param \DateTime $pnaUpdatedAt
     *
     * @return PlPenalizacion
     */
    public function setPnaUpdatedAt($pnaUpdatedAt)
    {
        $this->pnaUpdatedAt = $pnaUpdatedAt;

        return $this;
    }

    /**
     * Get pnaUpdatedAt
     *
     * @return \DateTime
     */
    public function getPnaUpdatedAt()
    {
        return $this->pnaUpdatedAt;
    }

    /**
     * Set pnaActive
     *
     * @param boolean $pnaActive
     *
     * @return PlPenalizacion
     */
    public function setPnaActive($pnaActive)
    {
        $this->pnaActive = $pnaActive;

        return $this;
    }

    /**
     * Get pnaActive
     *
     * @return boolean
     */
    public function getPnaActive()
    {
        return $this->pnaActive;
    }

    /**
     * Set pnaPti
     *
     * @param \PylifeBundle\Entity\PlTipoPenalizacion $pnaPti
     *
     * @return PlPenalizacion
     */
    public function setPnaPti(\PylifeBundle\Entity\PlTipoPenalizacion $pnaPti = null)
    {
        $this->pnaPti = $pnaPti;

        return $this;
    }

    /**
     * Get pnaPti
     *
     * @return \PylifeBundle\Entity\PlTipoPenalizacion
     */
    public function getPnaPti()
    {
        return $this->pnaPti;
    }

    /**
     * Set pnaUsr
     *
     * @param \PylifeBundle\Entity\PlUser $pnaUsr
     *
     * @return PlPenalizacion
     */
    public function setPnaUsr(\PylifeBundle\Entity\PlUser $pnaUsr = null)
    {
        $this->pnaUsr = $pnaUsr;

        return $this;
    }

    /**
     * Get pnaUsr
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getPnaUsr()
    {
        return $this->pnaUsr;
    }

    /**
     * Set pnaUsrCreatedBy
     *
     * @param \PylifeBundle\Entity\PlUser $pnaUsrCreatedBy
     *
     * @return PlPenalizacion
     */
    public function setPnaUsrCreatedBy(\PylifeBundle\Entity\PlUser $pnaUsrCreatedBy = null)
    {
        $this->pnaUsrCreatedBy = $pnaUsrCreatedBy;

        return $this;
    }

    /**
     * Get pnaUsrCreatedBy
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getPnaUsrCreatedBy()
    {
        return $this->pnaUsrCreatedBy;
    }

    /**
     * Set pnaUsrUpdatedBy
     *
     * @param \PylifeBundle\Entity\PlUser $pnaUsrUpdatedBy
     *
     * @return PlPenalizacion
     */
    public function setPnaUsrUpdatedBy(\PylifeBundle\Entity\PlUser $pnaUsrUpdatedBy = null)
    {
        $this->pnaUsrUpdatedBy = $pnaUsrUpdatedBy;

        return $this;
    }

    /**
     * Get pnaUsrUpdatedBy
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getPnaUsrUpdatedBy()
    {
        return $this->pnaUsrUpdatedBy;
    }
}
