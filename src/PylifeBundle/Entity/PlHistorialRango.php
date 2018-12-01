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
    private $hiraActive = true;

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
     * Set hiraCreatedAt
     *
     * @param \DateTime $hiraCreatedAt
     *
     * @return PlHistorialRango
     */
    public function setHiraCreatedAt($hiraCreatedAt)
    {
        $this->hiraCreatedAt = $hiraCreatedAt;

        return $this;
    }

    /**
     * Get hiraCreatedAt
     *
     * @return \DateTime
     */
    public function getHiraCreatedAt()
    {
        return $this->hiraCreatedAt;
    }

    /**
     * Set hiraUpdatedAt
     *
     * @param \DateTime $hiraUpdatedAt
     *
     * @return PlHistorialRango
     */
    public function setHiraUpdatedAt($hiraUpdatedAt)
    {
        $this->hiraUpdatedAt = $hiraUpdatedAt;

        return $this;
    }

    /**
     * Get hiraUpdatedAt
     *
     * @return \DateTime
     */
    public function getHiraUpdatedAt()
    {
        return $this->hiraUpdatedAt;
    }

    /**
     * Set hiraActive
     *
     * @param boolean $hiraActive
     *
     * @return PlHistorialRango
     */
    public function setHiraActive($hiraActive)
    {
        $this->hiraActive = $hiraActive;

        return $this;
    }

    /**
     * Get hiraActive
     *
     * @return boolean
     */
    public function getHiraActive()
    {
        return $this->hiraActive;
    }

    /**
     * Set hiraRaNuevo
     *
     * @param \PylifeBundle\Entity\PlRango $hiraRaNuevo
     *
     * @return PlHistorialRango
     */
    public function setHiraRaNuevo(\PylifeBundle\Entity\PlRango $hiraRaNuevo = null)
    {
        $this->hiraRaNuevo = $hiraRaNuevo;

        return $this;
    }

    /**
     * Get hiraRaNuevo
     *
     * @return \PylifeBundle\Entity\PlRango
     */
    public function getHiraRaNuevo()
    {
        return $this->hiraRaNuevo;
    }

    /**
     * Set hiraRaAnterior
     *
     * @param \PylifeBundle\Entity\PlRango $hiraRaAnterior
     *
     * @return PlHistorialRango
     */
    public function setHiraRaAnterior(\PylifeBundle\Entity\PlRango $hiraRaAnterior = null)
    {
        $this->hiraRaAnterior = $hiraRaAnterior;

        return $this;
    }

    /**
     * Get hiraRaAnterior
     *
     * @return \PylifeBundle\Entity\PlRango
     */
    public function getHiraRaAnterior()
    {
        return $this->hiraRaAnterior;
    }

    /**
     * Set hiraUsr
     *
     * @param \PylifeBundle\Entity\PlUser $hiraUsr
     *
     * @return PlHistorialRango
     */
    public function setHiraUsr(\PylifeBundle\Entity\PlUser $hiraUsr = null)
    {
        $this->hiraUsr = $hiraUsr;

        return $this;
    }

    /**
     * Get hiraUsr
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getHiraUsr()
    {
        return $this->hiraUsr;
    }

    /**
     * Set hiraUsrCreatedBy
     *
     * @param \PylifeBundle\Entity\PlUser $hiraUsrCreatedBy
     *
     * @return PlHistorialRango
     */
    public function setHiraUsrCreatedBy(\PylifeBundle\Entity\PlUser $hiraUsrCreatedBy = null)
    {
        $this->hiraUsrCreatedBy = $hiraUsrCreatedBy;

        return $this;
    }

    /**
     * Get hiraUsrCreatedBy
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getHiraUsrCreatedBy()
    {
        return $this->hiraUsrCreatedBy;
    }

    /**
     * Set hiraUsrUpdatedBy
     *
     * @param \PylifeBundle\Entity\PlUser $hiraUsrUpdatedBy
     *
     * @return PlHistorialRango
     */
    public function setHiraUsrUpdatedBy(\PylifeBundle\Entity\PlUser $hiraUsrUpdatedBy = null)
    {
        $this->hiraUsrUpdatedBy = $hiraUsrUpdatedBy;

        return $this;
    }

    /**
     * Get hiraUsrUpdatedBy
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getHiraUsrUpdatedBy()
    {
        return $this->hiraUsrUpdatedBy;
    }
}
