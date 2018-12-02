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
    private $paActive = true;

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
     * Set paNombre
     *
     * @param string $paNombre
     *
     * @return PlPais
     */
    public function setPaNombre($paNombre)
    {
        $this->paNombre = $paNombre;

        return $this;
    }

    /**
     * Get paNombre
     *
     * @return string
     */
    public function getPaNombre()
    {
        return $this->paNombre;
    }

    /**
     * Set paCodigoArea
     *
     * @param string $paCodigoArea
     *
     * @return PlPais
     */
    public function setPaCodigoArea($paCodigoArea)
    {
        $this->paCodigoArea = $paCodigoArea;

        return $this;
    }

    /**
     * Get paCodigoArea
     *
     * @return string
     */
    public function getPaCodigoArea()
    {
        return $this->paCodigoArea;
    }

    /**
     * Set paCreatedAt
     *
     * @param \DateTime $paCreatedAt
     *
     * @return PlPais
     */
    public function setPaCreatedAt($paCreatedAt)
    {
        $this->paCreatedAt = $paCreatedAt;

        return $this;
    }

    /**
     * Get paCreatedAt
     *
     * @return \DateTime
     */
    public function getPaCreatedAt()
    {
        return $this->paCreatedAt;
    }

    /**
     * Set paUpdatedAt
     *
     * @param \DateTime $paUpdatedAt
     *
     * @return PlPais
     */
    public function setPaUpdatedAt($paUpdatedAt)
    {
        $this->paUpdatedAt = $paUpdatedAt;

        return $this;
    }

    /**
     * Get paUpdatedAt
     *
     * @return \DateTime
     */
    public function getPaUpdatedAt()
    {
        return $this->paUpdatedAt;
    }

    /**
     * Set paActive
     *
     * @param boolean $paActive
     *
     * @return PlPais
     */
    public function setPaActive($paActive)
    {
        $this->paActive = $paActive;

        return $this;
    }

    /**
     * Get paActive
     *
     * @return boolean
     */
    public function getPaActive()
    {
        return $this->paActive;
    }

    /**
     * Set paUsrCreatedBy
     *
     * @param \PylifeBundle\Entity\PlUser $paUsrCreatedBy
     *
     * @return PlPais
     */
    public function setPaUsrCreatedBy(\PylifeBundle\Entity\PlUser $paUsrCreatedBy = null)
    {
        $this->paUsrCreatedBy = $paUsrCreatedBy;

        return $this;
    }

    /**
     * Get paUsrCreatedBy
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getPaUsrCreatedBy()
    {
        return $this->paUsrCreatedBy;
    }

    /**
     * Set paUsrUpdatedBy
     *
     * @param \PylifeBundle\Entity\PlUser $paUsrUpdatedBy
     *
     * @return PlPais
     */
    public function setPaUsrUpdatedBy(\PylifeBundle\Entity\PlUser $paUsrUpdatedBy = null)
    {
        $this->paUsrUpdatedBy = $paUsrUpdatedBy;

        return $this;
    }

    /**
     * Get paUsrUpdatedBy
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getPaUsrUpdatedBy()
    {
        return $this->paUsrUpdatedBy;
    }
    
    public function __toString(){
    		return $this->paNombre;
    }
}
