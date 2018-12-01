<?php

namespace PylifeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlVenta
 *
 * @ORM\Table(name="pl_venta", indexes={@ORM\Index(name="fk_pl_user_pl_venta_idx", columns={"ven_usr_id"}), @ORM\Index(name="fk_pl_pais_pl_venta_idx", columns={"ven_pa_id"}), @ORM\Index(name="fk_pl_user_pl_venta_created_idx", columns={"ven_usr_created_by"}), @ORM\Index(name="fk_pl_user_pl_venta_updated_idx", columns={"ven_usr_updated_by"})})
 * @ORM\Entity
 */
class PlVenta
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
     * @ORM\Column(name="ven_created_at", type="datetime", nullable=false)
     */
    private $venCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ven_updated_at", type="datetime", nullable=true)
     */
    private $venUpdatedAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ven_active", type="boolean", nullable=false)
     */
    private $venActive = true;

    /**
     * @var \PylifeBundle\Entity\PlPais
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlPais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ven_pa_id", referencedColumnName="id")
     * })
     */
    private $venPa;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ven_usr_id", referencedColumnName="id")
     * })
     */
    private $venUsr;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ven_usr_created_by", referencedColumnName="id")
     * })
     */
    private $venUsrCreatedBy;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ven_usr_updated_by", referencedColumnName="id")
     * })
     */
    private $venUsrUpdatedBy;



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
     * Set venCreatedAt
     *
     * @param \DateTime $venCreatedAt
     *
     * @return PlVenta
     */
    public function setVenCreatedAt($venCreatedAt)
    {
        $this->venCreatedAt = $venCreatedAt;

        return $this;
    }

    /**
     * Get venCreatedAt
     *
     * @return \DateTime
     */
    public function getVenCreatedAt()
    {
        return $this->venCreatedAt;
    }

    /**
     * Set venUpdatedAt
     *
     * @param \DateTime $venUpdatedAt
     *
     * @return PlVenta
     */
    public function setVenUpdatedAt($venUpdatedAt)
    {
        $this->venUpdatedAt = $venUpdatedAt;

        return $this;
    }

    /**
     * Get venUpdatedAt
     *
     * @return \DateTime
     */
    public function getVenUpdatedAt()
    {
        return $this->venUpdatedAt;
    }

    /**
     * Set venActive
     *
     * @param boolean $venActive
     *
     * @return PlVenta
     */
    public function setVenActive($venActive)
    {
        $this->venActive = $venActive;

        return $this;
    }

    /**
     * Get venActive
     *
     * @return boolean
     */
    public function getVenActive()
    {
        return $this->venActive;
    }

    /**
     * Set venPa
     *
     * @param \PylifeBundle\Entity\PlPais $venPa
     *
     * @return PlVenta
     */
    public function setVenPa(\PylifeBundle\Entity\PlPais $venPa = null)
    {
        $this->venPa = $venPa;

        return $this;
    }

    /**
     * Get venPa
     *
     * @return \PylifeBundle\Entity\PlPais
     */
    public function getVenPa()
    {
        return $this->venPa;
    }

    /**
     * Set venUsr
     *
     * @param \PylifeBundle\Entity\PlUser $venUsr
     *
     * @return PlVenta
     */
    public function setVenUsr(\PylifeBundle\Entity\PlUser $venUsr = null)
    {
        $this->venUsr = $venUsr;

        return $this;
    }

    /**
     * Get venUsr
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getVenUsr()
    {
        return $this->venUsr;
    }

    /**
     * Set venUsrCreatedBy
     *
     * @param \PylifeBundle\Entity\PlUser $venUsrCreatedBy
     *
     * @return PlVenta
     */
    public function setVenUsrCreatedBy(\PylifeBundle\Entity\PlUser $venUsrCreatedBy = null)
    {
        $this->venUsrCreatedBy = $venUsrCreatedBy;

        return $this;
    }

    /**
     * Get venUsrCreatedBy
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getVenUsrCreatedBy()
    {
        return $this->venUsrCreatedBy;
    }

    /**
     * Set venUsrUpdatedBy
     *
     * @param \PylifeBundle\Entity\PlUser $venUsrUpdatedBy
     *
     * @return PlVenta
     */
    public function setVenUsrUpdatedBy(\PylifeBundle\Entity\PlUser $venUsrUpdatedBy = null)
    {
        $this->venUsrUpdatedBy = $venUsrUpdatedBy;

        return $this;
    }

    /**
     * Get venUsrUpdatedBy
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getVenUsrUpdatedBy()
    {
        return $this->venUsrUpdatedBy;
    }
}
