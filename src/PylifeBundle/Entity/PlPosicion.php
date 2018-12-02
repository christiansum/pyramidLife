<?php

namespace PylifeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlPosicion
 *
 * @ORM\Table(name="pl_posicion", indexes={@ORM\Index(name="fk_pl_premio_pl_posicion_idx", columns={"pos_pre_id"}), @ORM\Index(name="fk_pl_periodo_premio_pl_posicion_idx", columns={"pos_pp_id"}), @ORM\Index(name="fk_pl_moneda_pl_posicion_idx", columns={"pos_mon_id"}), @ORM\Index(name="fk_pl_user_pl_posicion_created_idx", columns={"pos_usr_created_by"}), @ORM\Index(name="fk_pl_user_pl_posicion_updated_idx", columns={"pos_usr_updated_by"})})
 * @ORM\Entity
 */
class PlPosicion
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
     * @ORM\Column(name="pos_nombre", type="string", length=80, nullable=false)
     */
    private $posNombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="pos_puntos", type="integer", nullable=true)
     */
    private $posPuntos;

    /**
     * @var float
     *
     * @ORM\Column(name="pos_ventas", type="float", precision=10, scale=0, nullable=true)
     */
    private $posVentas;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pos_created_at", type="datetime", nullable=false)
     */
    private $posCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pos_updated_at", type="datetime", nullable=true)
     */
    private $posUpdatedAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pos_active", type="boolean", nullable=false)
     */
    private $posActive = true;

    /**
     * @var \PylifeBundle\Entity\PlMoneda
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlMoneda")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pos_mon_id", referencedColumnName="id")
     * })
     */
    private $posMon;

    /**
     * @var \PylifeBundle\Entity\PlPeriodoPremio
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlPeriodoPremio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pos_pp_id", referencedColumnName="id")
     * })
     */
    private $posPp;

    /**
     * @var \PylifeBundle\Entity\PlPremio
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlPremio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pos_pre_id", referencedColumnName="id")
     * })
     */
    private $posPre;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pos_usr_created_by", referencedColumnName="id")
     * })
     */
    private $posUsrCreatedBy;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pos_usr_updated_by", referencedColumnName="id")
     * })
     */
    private $posUsrUpdatedBy;



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
     * Set posNombre
     *
     * @param string $posNombre
     *
     * @return PlPosicion
     */
    public function setPosNombre($posNombre)
    {
        $this->posNombre = $posNombre;

        return $this;
    }

    /**
     * Get posNombre
     *
     * @return string
     */
    public function getPosNombre()
    {
        return $this->posNombre;
    }

    /**
     * Set posPuntos
     *
     * @param integer $posPuntos
     *
     * @return PlPosicion
     */
    public function setPosPuntos($posPuntos)
    {
        $this->posPuntos = $posPuntos;

        return $this;
    }

    /**
     * Get posPuntos
     *
     * @return integer
     */
    public function getPosPuntos()
    {
        return $this->posPuntos;
    }

    /**
     * Set posVentas
     *
     * @param float $posVentas
     *
     * @return PlPosicion
     */
    public function setPosVentas($posVentas)
    {
        $this->posVentas = $posVentas;

        return $this;
    }

    /**
     * Get posVentas
     *
     * @return float
     */
    public function getPosVentas()
    {
        return $this->posVentas;
    }

    /**
     * Set posCreatedAt
     *
     * @param \DateTime $posCreatedAt
     *
     * @return PlPosicion
     */
    public function setPosCreatedAt($posCreatedAt)
    {
        $this->posCreatedAt = $posCreatedAt;

        return $this;
    }

    /**
     * Get posCreatedAt
     *
     * @return \DateTime
     */
    public function getPosCreatedAt()
    {
        return $this->posCreatedAt;
    }

    /**
     * Set posUpdatedAt
     *
     * @param \DateTime $posUpdatedAt
     *
     * @return PlPosicion
     */
    public function setPosUpdatedAt($posUpdatedAt)
    {
        $this->posUpdatedAt = $posUpdatedAt;

        return $this;
    }

    /**
     * Get posUpdatedAt
     *
     * @return \DateTime
     */
    public function getPosUpdatedAt()
    {
        return $this->posUpdatedAt;
    }

    /**
     * Set posActive
     *
     * @param boolean $posActive
     *
     * @return PlPosicion
     */
    public function setPosActive($posActive)
    {
        $this->posActive = $posActive;

        return $this;
    }

    /**
     * Get posActive
     *
     * @return boolean
     */
    public function getPosActive()
    {
        return $this->posActive;
    }

    /**
     * Set posMon
     *
     * @param \PylifeBundle\Entity\PlMoneda $posMon
     *
     * @return PlPosicion
     */
    public function setPosMon(\PylifeBundle\Entity\PlMoneda $posMon = null)
    {
        $this->posMon = $posMon;

        return $this;
    }

    /**
     * Get posMon
     *
     * @return \PylifeBundle\Entity\PlMoneda
     */
    public function getPosMon()
    {
        return $this->posMon;
    }

    /**
     * Set posPp
     *
     * @param \PylifeBundle\Entity\PlPeriodoPremio $posPp
     *
     * @return PlPosicion
     */
    public function setPosPp(\PylifeBundle\Entity\PlPeriodoPremio $posPp = null)
    {
        $this->posPp = $posPp;

        return $this;
    }

    /**
     * Get posPp
     *
     * @return \PylifeBundle\Entity\PlPeriodoPremio
     */
    public function getPosPp()
    {
        return $this->posPp;
    }

    /**
     * Set posPre
     *
     * @param \PylifeBundle\Entity\PlPremio $posPre
     *
     * @return PlPosicion
     */
    public function setPosPre(\PylifeBundle\Entity\PlPremio $posPre = null)
    {
        $this->posPre = $posPre;

        return $this;
    }

    /**
     * Get posPre
     *
     * @return \PylifeBundle\Entity\PlPremio
     */
    public function getPosPre()
    {
        return $this->posPre;
    }

    /**
     * Set posUsrCreatedBy
     *
     * @param \PylifeBundle\Entity\PlUser $posUsrCreatedBy
     *
     * @return PlPosicion
     */
    public function setPosUsrCreatedBy(\PylifeBundle\Entity\PlUser $posUsrCreatedBy = null)
    {
        $this->posUsrCreatedBy = $posUsrCreatedBy;

        return $this;
    }

    /**
     * Get posUsrCreatedBy
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getPosUsrCreatedBy()
    {
        return $this->posUsrCreatedBy;
    }

    /**
     * Set posUsrUpdatedBy
     *
     * @param \PylifeBundle\Entity\PlUser $posUsrUpdatedBy
     *
     * @return PlPosicion
     */
    public function setPosUsrUpdatedBy(\PylifeBundle\Entity\PlUser $posUsrUpdatedBy = null)
    {
        $this->posUsrUpdatedBy = $posUsrUpdatedBy;

        return $this;
    }

    /**
     * Get posUsrUpdatedBy
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getPosUsrUpdatedBy()
    {
        return $this->posUsrUpdatedBy;
    }
	public function __toString(){
		return $this->posNombre;
	}
}
