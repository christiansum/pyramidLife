<?php

namespace PylifeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlRole
 *
 * @ORM\Table(name="pl_role", indexes={@ORM\Index(name="fk_pl_user_pl_role_created_idx", columns={"rol_usr_created_by"}), @ORM\Index(name="fk_pl_user_pl_role_updated_idx", columns={"rol_usr_updated_by"})})
 * @ORM\Entity
 */
class PlRole
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
     * @ORM\Column(name="rol_nombre", type="string", length=70, nullable=false)
     */
    private $rolNombre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rol_created_at", type="datetime", nullable=false)
     */
    private $rolCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rol_updated_at", type="datetime", nullable=true)
     */
    private $rolUpdatedAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="rol_active", type="boolean", nullable=false)
     */
    private $rolActive = true;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="rol_usr_created_by", referencedColumnName="id")
     * })
     */
    private $rolUsrCreatedBy;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="rol_usr_updated_by", referencedColumnName="id")
     * })
     */
    private $rolUsrUpdatedBy;



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
     * Set rolNombre
     *
     * @param string $rolNombre
     *
     * @return PlRole
     */
    public function setRolNombre($rolNombre)
    {
        $this->rolNombre = $rolNombre;

        return $this;
    }

    /**
     * Get rolNombre
     *
     * @return string
     */
    public function getRolNombre()
    {
        return $this->rolNombre;
    }

    /**
     * Set rolCreatedAt
     *
     * @param \DateTime $rolCreatedAt
     *
     * @return PlRole
     */
    public function setRolCreatedAt($rolCreatedAt)
    {
        $this->rolCreatedAt = $rolCreatedAt;

        return $this;
    }

    /**
     * Get rolCreatedAt
     *
     * @return \DateTime
     */
    public function getRolCreatedAt()
    {
        return $this->rolCreatedAt;
    }

    /**
     * Set rolUpdatedAt
     *
     * @param \DateTime $rolUpdatedAt
     *
     * @return PlRole
     */
    public function setRolUpdatedAt($rolUpdatedAt)
    {
        $this->rolUpdatedAt = $rolUpdatedAt;

        return $this;
    }

    /**
     * Get rolUpdatedAt
     *
     * @return \DateTime
     */
    public function getRolUpdatedAt()
    {
        return $this->rolUpdatedAt;
    }

    /**
     * Set rolActive
     *
     * @param boolean $rolActive
     *
     * @return PlRole
     */
    public function setRolActive($rolActive)
    {
        $this->rolActive = $rolActive;

        return $this;
    }

    /**
     * Get rolActive
     *
     * @return boolean
     */
    public function getRolActive()
    {
        return $this->rolActive;
    }

    /**
     * Set rolUsrCreatedBy
     *
     * @param \PylifeBundle\Entity\PlUser $rolUsrCreatedBy
     *
     * @return PlRole
     */
    public function setRolUsrCreatedBy(\PylifeBundle\Entity\PlUser $rolUsrCreatedBy = null)
    {
        $this->rolUsrCreatedBy = $rolUsrCreatedBy;

        return $this;
    }

    /**
     * Get rolUsrCreatedBy
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getRolUsrCreatedBy()
    {
        return $this->rolUsrCreatedBy;
    }

    /**
     * Set rolUsrUpdatedBy
     *
     * @param \PylifeBundle\Entity\PlUser $rolUsrUpdatedBy
     *
     * @return PlRole
     */
    public function setRolUsrUpdatedBy(\PylifeBundle\Entity\PlUser $rolUsrUpdatedBy = null)
    {
        $this->rolUsrUpdatedBy = $rolUsrUpdatedBy;

        return $this;
    }

    /**
     * Get rolUsrUpdatedBy
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getRolUsrUpdatedBy()
    {
        return $this->rolUsrUpdatedBy;
    }
	
	public function __toString(){
		return $this->rolNombre;
	}
}
