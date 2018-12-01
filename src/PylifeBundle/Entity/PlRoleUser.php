<?php

namespace PylifeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlRoleUser
 *
 * @ORM\Table(name="pl_role_user", indexes={@ORM\Index(name="fk_pl_user_pl_role_idx", columns={"ru_usr_id"}), @ORM\Index(name="fk_pl_role_pl_role_user_idx", columns={"ru_rol_id"}), @ORM\Index(name="fk_pl_user_pl_role_user_created_idx", columns={"ru_usr_created_by"}), @ORM\Index(name="fk_pl_user_pl_role_user_updated_idx", columns={"ru_usr_updated_by"})})
 * @ORM\Entity
 */
class PlRoleUser
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
     * @ORM\Column(name="ru_created_at", type="datetime", nullable=false)
     */
    private $ruCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ru_updated_at", type="datetime", nullable=true)
     */
    private $ruUpdatedAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ru_active", type="boolean", nullable=false)
     */
    private $ruActive = '1';

    /**
     * @var \PylifeBundle\Entity\PlRole
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlRole")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ru_rol_id", referencedColumnName="id")
     * })
     */
    private $ruRol;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ru_usr_id", referencedColumnName="id")
     * })
     */
    private $ruUsr;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ru_usr_created_by", referencedColumnName="id")
     * })
     */
    private $ruUsrCreatedBy;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ru_usr_updated_by", referencedColumnName="id")
     * })
     */
    private $ruUsrUpdatedBy;



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
     * Set ruCreatedAt
     *
     * @param \DateTime $ruCreatedAt
     *
     * @return PlRoleUser
     */
    public function setRuCreatedAt($ruCreatedAt)
    {
        $this->ruCreatedAt = $ruCreatedAt;

        return $this;
    }

    /**
     * Get ruCreatedAt
     *
     * @return \DateTime
     */
    public function getRuCreatedAt()
    {
        return $this->ruCreatedAt;
    }

    /**
     * Set ruUpdatedAt
     *
     * @param \DateTime $ruUpdatedAt
     *
     * @return PlRoleUser
     */
    public function setRuUpdatedAt($ruUpdatedAt)
    {
        $this->ruUpdatedAt = $ruUpdatedAt;

        return $this;
    }

    /**
     * Get ruUpdatedAt
     *
     * @return \DateTime
     */
    public function getRuUpdatedAt()
    {
        return $this->ruUpdatedAt;
    }

    /**
     * Set ruActive
     *
     * @param boolean $ruActive
     *
     * @return PlRoleUser
     */
    public function setRuActive($ruActive)
    {
        $this->ruActive = $ruActive;

        return $this;
    }

    /**
     * Get ruActive
     *
     * @return boolean
     */
    public function getRuActive()
    {
        return $this->ruActive;
    }

    /**
     * Set ruRol
     *
     * @param \PylifeBundle\Entity\PlRole $ruRol
     *
     * @return PlRoleUser
     */
    public function setRuRol(\PylifeBundle\Entity\PlRole $ruRol = null)
    {
        $this->ruRol = $ruRol;

        return $this;
    }

    /**
     * Get ruRol
     *
     * @return \PylifeBundle\Entity\PlRole
     */
    public function getRuRol()
    {
        return $this->ruRol;
    }

    /**
     * Set ruUsr
     *
     * @param \PylifeBundle\Entity\PlUser $ruUsr
     *
     * @return PlRoleUser
     */
    public function setRuUsr(\PylifeBundle\Entity\PlUser $ruUsr = null)
    {
        $this->ruUsr = $ruUsr;

        return $this;
    }

    /**
     * Get ruUsr
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getRuUsr()
    {
        return $this->ruUsr;
    }

    /**
     * Set ruUsrCreatedBy
     *
     * @param \PylifeBundle\Entity\PlUser $ruUsrCreatedBy
     *
     * @return PlRoleUser
     */
    public function setRuUsrCreatedBy(\PylifeBundle\Entity\PlUser $ruUsrCreatedBy = null)
    {
        $this->ruUsrCreatedBy = $ruUsrCreatedBy;

        return $this;
    }

    /**
     * Get ruUsrCreatedBy
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getRuUsrCreatedBy()
    {
        return $this->ruUsrCreatedBy;
    }

    /**
     * Set ruUsrUpdatedBy
     *
     * @param \PylifeBundle\Entity\PlUser $ruUsrUpdatedBy
     *
     * @return PlRoleUser
     */
    public function setRuUsrUpdatedBy(\PylifeBundle\Entity\PlUser $ruUsrUpdatedBy = null)
    {
        $this->ruUsrUpdatedBy = $ruUsrUpdatedBy;

        return $this;
    }

    /**
     * Get ruUsrUpdatedBy
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getRuUsrUpdatedBy()
    {
        return $this->ruUsrUpdatedBy;
    }
}
