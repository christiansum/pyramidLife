<?php

namespace PylifeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlProducto
 *
 * @ORM\Table(name="pl_producto", indexes={@ORM\Index(name="fk_pl_pais_pl_producto_idx", columns={"pro_pa_id"}), @ORM\Index(name="fk_pl_moneda_pl_producto_idx", columns={"pro_mo_id"}), @ORM\Index(name="fk_pl_user_pl_producto_created_idx", columns={"pro_usr_created_by"}), @ORM\Index(name="fk_pl_user_pl_producto_updated_idx", columns={"pro_usr_updated_by"})})
 * @ORM\Entity
 */
class PlProducto
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
     * @ORM\Column(name="pro_nombre", type="string", length=100, nullable=false)
     */
    private $proNombre;

    /**
     * @var float
     *
     * @ORM\Column(name="pro_precio", type="float", precision=10, scale=0, nullable=false)
     */
    private $proPrecio;

    /**
     * @var integer
     *
     * @ORM\Column(name="pro_puntos", type="integer", nullable=false)
     */
    private $proPuntos;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pro_created_at", type="datetime", nullable=false)
     */
    private $proCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pro_updated_at", type="datetime", nullable=true)
     */
    private $proUpdatedAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pro_active", type="boolean", nullable=false)
     */
    private $proActive = true;

    /**
     * @var \PylifeBundle\Entity\PlMoneda
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlMoneda")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pro_mo_id", referencedColumnName="id")
     * })
     */
    private $proMo;

    /**
     * @var \PylifeBundle\Entity\PlPais
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlPais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pro_pa_id", referencedColumnName="id")
     * })
     */
    private $proPa;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pro_usr_created_by", referencedColumnName="id")
     * })
     */
    private $proUsrCreatedBy;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pro_usr_updated_by", referencedColumnName="id")
     * })
     */
    private $proUsrUpdatedBy;



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
     * Set proNombre
     *
     * @param string $proNombre
     *
     * @return PlProducto
     */
    public function setProNombre($proNombre)
    {
        $this->proNombre = $proNombre;

        return $this;
    }

    /**
     * Get proNombre
     *
     * @return string
     */
    public function getProNombre()
    {
        return $this->proNombre;
    }

    /**
     * Set proPrecio
     *
     * @param float $proPrecio
     *
     * @return PlProducto
     */
    public function setProPrecio($proPrecio)
    {
        $this->proPrecio = $proPrecio;

        return $this;
    }

    /**
     * Get proPrecio
     *
     * @return float
     */
    public function getProPrecio()
    {
        return $this->proPrecio;
    }

    /**
     * Set proPuntos
     *
     * @param integer $proPuntos
     *
     * @return PlProducto
     */
    public function setProPuntos($proPuntos)
    {
        $this->proPuntos = $proPuntos;

        return $this;
    }

    /**
     * Get proPuntos
     *
     * @return integer
     */
    public function getProPuntos()
    {
        return $this->proPuntos;
    }

    /**
     * Set proCreatedAt
     *
     * @param \DateTime $proCreatedAt
     *
     * @return PlProducto
     */
    public function setProCreatedAt($proCreatedAt)
    {
        $this->proCreatedAt = $proCreatedAt;

        return $this;
    }

    /**
     * Get proCreatedAt
     *
     * @return \DateTime
     */
    public function getProCreatedAt()
    {
        return $this->proCreatedAt;
    }

    /**
     * Set proUpdatedAt
     *
     * @param \DateTime $proUpdatedAt
     *
     * @return PlProducto
     */
    public function setProUpdatedAt($proUpdatedAt)
    {
        $this->proUpdatedAt = $proUpdatedAt;

        return $this;
    }

    /**
     * Get proUpdatedAt
     *
     * @return \DateTime
     */
    public function getProUpdatedAt()
    {
        return $this->proUpdatedAt;
    }

    /**
     * Set proActive
     *
     * @param boolean $proActive
     *
     * @return PlProducto
     */
    public function setProActive($proActive)
    {
        $this->proActive = $proActive;

        return $this;
    }

    /**
     * Get proActive
     *
     * @return boolean
     */
    public function getProActive()
    {
        return $this->proActive;
    }

    /**
     * Set proMo
     *
     * @param \PylifeBundle\Entity\PlMoneda $proMo
     *
     * @return PlProducto
     */
    public function setProMo(\PylifeBundle\Entity\PlMoneda $proMo = null)
    {
        $this->proMo = $proMo;

        return $this;
    }

    /**
     * Get proMo
     *
     * @return \PylifeBundle\Entity\PlMoneda
     */
    public function getProMo()
    {
        return $this->proMo;
    }

    /**
     * Set proPa
     *
     * @param \PylifeBundle\Entity\PlPais $proPa
     *
     * @return PlProducto
     */
    public function setProPa(\PylifeBundle\Entity\PlPais $proPa = null)
    {
        $this->proPa = $proPa;

        return $this;
    }

    /**
     * Get proPa
     *
     * @return \PylifeBundle\Entity\PlPais
     */
    public function getProPa()
    {
        return $this->proPa;
    }

    /**
     * Set proUsrCreatedBy
     *
     * @param \PylifeBundle\Entity\PlUser $proUsrCreatedBy
     *
     * @return PlProducto
     */
    public function setProUsrCreatedBy(\PylifeBundle\Entity\PlUser $proUsrCreatedBy = null)
    {
        $this->proUsrCreatedBy = $proUsrCreatedBy;

        return $this;
    }

    /**
     * Get proUsrCreatedBy
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getProUsrCreatedBy()
    {
        return $this->proUsrCreatedBy;
    }

    /**
     * Set proUsrUpdatedBy
     *
     * @param \PylifeBundle\Entity\PlUser $proUsrUpdatedBy
     *
     * @return PlProducto
     */
    public function setProUsrUpdatedBy(\PylifeBundle\Entity\PlUser $proUsrUpdatedBy = null)
    {
        $this->proUsrUpdatedBy = $proUsrUpdatedBy;

        return $this;
    }

    /**
     * Get proUsrUpdatedBy
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getProUsrUpdatedBy()
    {
        return $this->proUsrUpdatedBy;
    }
	
	public function __toString(){
		return $this->proNombre;
	}
}
