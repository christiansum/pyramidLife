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
     * Set ppNombre
     *
     * @param string $ppNombre
     *
     * @return PlPeriodoPremio
     */
    public function setPpNombre($ppNombre)
    {
        $this->ppNombre = $ppNombre;

        return $this;
    }

    /**
     * Get ppNombre
     *
     * @return string
     */
    public function getPpNombre()
    {
        return $this->ppNombre;
    }

    /**
     * Set ppFechaInicial
     *
     * @param \DateTime $ppFechaInicial
     *
     * @return PlPeriodoPremio
     */
    public function setPpFechaInicial($ppFechaInicial)
    {
        $this->ppFechaInicial = $ppFechaInicial;

        return $this;
    }

    /**
     * Get ppFechaInicial
     *
     * @return \DateTime
     */
    public function getPpFechaInicial()
    {
        return $this->ppFechaInicial;
    }

    /**
     * Set ppFechaFinal
     *
     * @param \DateTime $ppFechaFinal
     *
     * @return PlPeriodoPremio
     */
    public function setPpFechaFinal($ppFechaFinal)
    {
        $this->ppFechaFinal = $ppFechaFinal;

        return $this;
    }

    /**
     * Get ppFechaFinal
     *
     * @return \DateTime
     */
    public function getPpFechaFinal()
    {
        return $this->ppFechaFinal;
    }

    /**
     * Set ppCreatedAt
     *
     * @param \DateTime $ppCreatedAt
     *
     * @return PlPeriodoPremio
     */
    public function setPpCreatedAt($ppCreatedAt)
    {
        $this->ppCreatedAt = $ppCreatedAt;

        return $this;
    }

    /**
     * Get ppCreatedAt
     *
     * @return \DateTime
     */
    public function getPpCreatedAt()
    {
        return $this->ppCreatedAt;
    }

    /**
     * Set ppUpdatedAt
     *
     * @param \DateTime $ppUpdatedAt
     *
     * @return PlPeriodoPremio
     */
    public function setPpUpdatedAt($ppUpdatedAt)
    {
        $this->ppUpdatedAt = $ppUpdatedAt;

        return $this;
    }

    /**
     * Get ppUpdatedAt
     *
     * @return \DateTime
     */
    public function getPpUpdatedAt()
    {
        return $this->ppUpdatedAt;
    }

    /**
     * Set ppActive
     *
     * @param boolean $ppActive
     *
     * @return PlPeriodoPremio
     */
    public function setPpActive($ppActive)
    {
        $this->ppActive = $ppActive;

        return $this;
    }

    /**
     * Get ppActive
     *
     * @return boolean
     */
    public function getPpActive()
    {
        return $this->ppActive;
    }

    /**
     * Set ppUsrCreatedBy
     *
     * @param \PylifeBundle\Entity\PlUser $ppUsrCreatedBy
     *
     * @return PlPeriodoPremio
     */
    public function setPpUsrCreatedBy(\PylifeBundle\Entity\PlUser $ppUsrCreatedBy = null)
    {
        $this->ppUsrCreatedBy = $ppUsrCreatedBy;

        return $this;
    }

    /**
     * Get ppUsrCreatedBy
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getPpUsrCreatedBy()
    {
        return $this->ppUsrCreatedBy;
    }

    /**
     * Set ppUsrUpdatedBy
     *
     * @param \PylifeBundle\Entity\PlUser $ppUsrUpdatedBy
     *
     * @return PlPeriodoPremio
     */
    public function setPpUsrUpdatedBy(\PylifeBundle\Entity\PlUser $ppUsrUpdatedBy = null)
    {
        $this->ppUsrUpdatedBy = $ppUsrUpdatedBy;

        return $this;
    }

    /**
     * Get ppUsrUpdatedBy
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getPpUsrUpdatedBy()
    {
        return $this->ppUsrUpdatedBy;
    }
}
