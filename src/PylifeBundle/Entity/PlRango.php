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
    private $raActive = true;

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
     * Set raNombre
     *
     * @param string $raNombre
     *
     * @return PlRango
     */
    public function setRaNombre($raNombre)
    {
        $this->raNombre = $raNombre;

        return $this;
    }

    /**
     * Get raNombre
     *
     * @return string
     */
    public function getRaNombre()
    {
        return $this->raNombre;
    }

    /**
     * Set raDescuentoMin
     *
     * @param integer $raDescuentoMin
     *
     * @return PlRango
     */
    public function setRaDescuentoMin($raDescuentoMin)
    {
        $this->raDescuentoMin = $raDescuentoMin;

        return $this;
    }

    /**
     * Get raDescuentoMin
     *
     * @return integer
     */
    public function getRaDescuentoMin()
    {
        return $this->raDescuentoMin;
    }

    /**
     * Set raDescuentoMax
     *
     * @param integer $raDescuentoMax
     *
     * @return PlRango
     */
    public function setRaDescuentoMax($raDescuentoMax)
    {
        $this->raDescuentoMax = $raDescuentoMax;

        return $this;
    }

    /**
     * Get raDescuentoMax
     *
     * @return integer
     */
    public function getRaDescuentoMax()
    {
        return $this->raDescuentoMax;
    }

    /**
     * Set raPuntosMin
     *
     * @param integer $raPuntosMin
     *
     * @return PlRango
     */
    public function setRaPuntosMin($raPuntosMin)
    {
        $this->raPuntosMin = $raPuntosMin;

        return $this;
    }

    /**
     * Get raPuntosMin
     *
     * @return integer
     */
    public function getRaPuntosMin()
    {
        return $this->raPuntosMin;
    }

    /**
     * Set raPuntosMax
     *
     * @param integer $raPuntosMax
     *
     * @return PlRango
     */
    public function setRaPuntosMax($raPuntosMax)
    {
        $this->raPuntosMax = $raPuntosMax;

        return $this;
    }

    /**
     * Get raPuntosMax
     *
     * @return integer
     */
    public function getRaPuntosMax()
    {
        return $this->raPuntosMax;
    }

    /**
     * Set raCantSupervisores
     *
     * @param integer $raCantSupervisores
     *
     * @return PlRango
     */
    public function setRaCantSupervisores($raCantSupervisores)
    {
        $this->raCantSupervisores = $raCantSupervisores;

        return $this;
    }

    /**
     * Get raCantSupervisores
     *
     * @return integer
     */
    public function getRaCantSupervisores()
    {
        return $this->raCantSupervisores;
    }

    /**
     * Set raPosicion
     *
     * @param integer $raPosicion
     *
     * @return PlRango
     */
    public function setRaPosicion($raPosicion)
    {
        $this->raPosicion = $raPosicion;

        return $this;
    }

    /**
     * Get raPosicion
     *
     * @return integer
     */
    public function getRaPosicion()
    {
        return $this->raPosicion;
    }

    /**
     * Set raTiempoConsecutivo
     *
     * @param integer $raTiempoConsecutivo
     *
     * @return PlRango
     */
    public function setRaTiempoConsecutivo($raTiempoConsecutivo)
    {
        $this->raTiempoConsecutivo = $raTiempoConsecutivo;

        return $this;
    }

    /**
     * Get raTiempoConsecutivo
     *
     * @return integer
     */
    public function getRaTiempoConsecutivo()
    {
        return $this->raTiempoConsecutivo;
    }

    /**
     * Set raTipoTiempo
     *
     * @param integer $raTipoTiempo
     *
     * @return PlRango
     */
    public function setRaTipoTiempo($raTipoTiempo)
    {
        $this->raTipoTiempo = $raTipoTiempo;

        return $this;
    }

    /**
     * Get raTipoTiempo
     *
     * @return integer
     */
    public function getRaTipoTiempo()
    {
        return $this->raTipoTiempo;
    }

    /**
     * Set raCreatedAt
     *
     * @param \DateTime $raCreatedAt
     *
     * @return PlRango
     */
    public function setRaCreatedAt($raCreatedAt)
    {
        $this->raCreatedAt = $raCreatedAt;

        return $this;
    }

    /**
     * Get raCreatedAt
     *
     * @return \DateTime
     */
    public function getRaCreatedAt()
    {
        return $this->raCreatedAt;
    }

    /**
     * Set raUpdatedAt
     *
     * @param \DateTime $raUpdatedAt
     *
     * @return PlRango
     */
    public function setRaUpdatedAt($raUpdatedAt)
    {
        $this->raUpdatedAt = $raUpdatedAt;

        return $this;
    }

    /**
     * Get raUpdatedAt
     *
     * @return \DateTime
     */
    public function getRaUpdatedAt()
    {
        return $this->raUpdatedAt;
    }

    /**
     * Set raActive
     *
     * @param boolean $raActive
     *
     * @return PlRango
     */
    public function setRaActive($raActive)
    {
        $this->raActive = $raActive;

        return $this;
    }

    /**
     * Get raActive
     *
     * @return boolean
     */
    public function getRaActive()
    {
        return $this->raActive;
    }

    /**
     * Set raUsrCreatedBy
     *
     * @param \PylifeBundle\Entity\PlUser $raUsrCreatedBy
     *
     * @return PlRango
     */
    public function setRaUsrCreatedBy(\PylifeBundle\Entity\PlUser $raUsrCreatedBy = null)
    {
        $this->raUsrCreatedBy = $raUsrCreatedBy;

        return $this;
    }

    /**
     * Get raUsrCreatedBy
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getRaUsrCreatedBy()
    {
        return $this->raUsrCreatedBy;
    }

    /**
     * Set raUsrUpdatedBy
     *
     * @param \PylifeBundle\Entity\PlUser $raUsrUpdatedBy
     *
     * @return PlRango
     */
    public function setRaUsrUpdatedBy(\PylifeBundle\Entity\PlUser $raUsrUpdatedBy = null)
    {
        $this->raUsrUpdatedBy = $raUsrUpdatedBy;

        return $this;
    }

    /**
     * Get raUsrUpdatedBy
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getRaUsrUpdatedBy()
    {
        return $this->raUsrUpdatedBy;
    }
	
	public function __toString(){
		return $this->raNombre;
	}
}
