<?php

namespace PylifeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlPiramide
 *
 * @ORM\Table(name="pl_piramide", indexes={@ORM\Index(name="fk_pl_user_pl_piramide_child_idx", columns={"py_usr_id_child"}), @ORM\Index(name="fk_pl_user_pl_piramide_parent_idx", columns={"py_usr_id_parent"}), @ORM\Index(name="fk_pl_user_pl_piramide_created_idx", columns={"py_usr_created_by"}), @ORM\Index(name="fk_pl_user_pl_piramide_updated_idx", columns={"py_usr_updated_by"})})
 * @ORM\Entity
 */
class PlPiramide
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
     * @ORM\Column(name="py_created_at", type="datetime", nullable=false)
     */
    private $pyCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="py_updated_at", type="datetime", nullable=true)
     */
    private $pyUpdatedAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="py_active", type="boolean", nullable=false)
     */
    private $pyActive;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="py_usr_id_child", referencedColumnName="id")
     * })
     */
    private $pyUsrChild;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="py_usr_created_by", referencedColumnName="id")
     * })
     */
    private $pyUsrCreatedBy;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="py_usr_id_parent", referencedColumnName="id")
     * })
     */
    private $pyUsrParent;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="py_usr_updated_by", referencedColumnName="id")
     * })
     */
    private $pyUsrUpdatedBy;



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
     * Set pyCreatedAt
     *
     * @param \DateTime $pyCreatedAt
     *
     * @return PlPiramide
     */
    public function setPyCreatedAt($pyCreatedAt)
    {
        $this->pyCreatedAt = $pyCreatedAt;

        return $this;
    }

    /**
     * Get pyCreatedAt
     *
     * @return \DateTime
     */
    public function getPyCreatedAt()
    {
        return $this->pyCreatedAt;
    }

    /**
     * Set pyUpdatedAt
     *
     * @param \DateTime $pyUpdatedAt
     *
     * @return PlPiramide
     */
    public function setPyUpdatedAt($pyUpdatedAt)
    {
        $this->pyUpdatedAt = $pyUpdatedAt;

        return $this;
    }

    /**
     * Get pyUpdatedAt
     *
     * @return \DateTime
     */
    public function getPyUpdatedAt()
    {
        return $this->pyUpdatedAt;
    }

    /**
     * Set pyActive
     *
     * @param boolean $pyActive
     *
     * @return PlPiramide
     */
    public function setPyActive($pyActive)
    {
        $this->pyActive = $pyActive;

        return $this;
    }

    /**
     * Get pyActive
     *
     * @return boolean
     */
    public function getPyActive()
    {
        return $this->pyActive;
    }

    /**
     * Set pyUsrChild
     *
     * @param \PylifeBundle\Entity\PlUser $pyUsrChild
     *
     * @return PlPiramide
     */
    public function setPyUsrChild(\PylifeBundle\Entity\PlUser $pyUsrChild = null)
    {
        $this->pyUsrChild = $pyUsrChild;

        return $this;
    }

    /**
     * Get pyUsrChild
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getPyUsrChild()
    {
        return $this->pyUsrChild;
    }

    /**
     * Set pyUsrCreatedBy
     *
     * @param \PylifeBundle\Entity\PlUser $pyUsrCreatedBy
     *
     * @return PlPiramide
     */
    public function setPyUsrCreatedBy(\PylifeBundle\Entity\PlUser $pyUsrCreatedBy = null)
    {
        $this->pyUsrCreatedBy = $pyUsrCreatedBy;

        return $this;
    }

    /**
     * Get pyUsrCreatedBy
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getPyUsrCreatedBy()
    {
        return $this->pyUsrCreatedBy;
    }

    /**
     * Set pyUsrParent
     *
     * @param \PylifeBundle\Entity\PlUser $pyUsrParent
     *
     * @return PlPiramide
     */
    public function setPyUsrParent(\PylifeBundle\Entity\PlUser $pyUsrParent = null)
    {
        $this->pyUsrParent = $pyUsrParent;

        return $this;
    }

    /**
     * Get pyUsrParent
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getPyUsrParent()
    {
        return $this->pyUsrParent;
    }

    /**
     * Set pyUsrUpdatedBy
     *
     * @param \PylifeBundle\Entity\PlUser $pyUsrUpdatedBy
     *
     * @return PlPiramide
     */
    public function setPyUsrUpdatedBy(\PylifeBundle\Entity\PlUser $pyUsrUpdatedBy = null)
    {
        $this->pyUsrUpdatedBy = $pyUsrUpdatedBy;

        return $this;
    }

    /**
     * Get pyUsrUpdatedBy
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getPyUsrUpdatedBy()
    {
        return $this->pyUsrUpdatedBy;
    }
}
