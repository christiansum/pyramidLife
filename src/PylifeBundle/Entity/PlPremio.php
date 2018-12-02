<?php

namespace PylifeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlPremio
 *
 * @ORM\Table(name="pl_premio", indexes={@ORM\Index(name="fk_pl_pais_pl_premio_idx", columns={"pre_pa_id"}), @ORM\Index(name="fk_pl_user_pl_premio_created_idx", columns={"pre_usr_created_by"}), @ORM\Index(name="fk_pl_user_pl_premio_updated_idx", columns={"pre_usr_updated_by"})})
 * @ORM\Entity
 */
class PlPremio
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
     * @ORM\Column(name="pre_nombre", type="string", length=60, nullable=true)
     */
    private $preNombre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pre_created_at", type="datetime", nullable=false)
     */
    private $preCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pre_updated_at", type="datetime", nullable=true)
     */
    private $preUpdatedAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pre_active", type="boolean", nullable=false)
     */
    private $preActive=true;

    /**
     * @var \PylifeBundle\Entity\PlPais
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlPais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pre_pa_id", referencedColumnName="id")
     * })
     */
    private $prePa;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pre_usr_created_by", referencedColumnName="id")
     * })
     */
    private $preUsrCreatedBy;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pre_usr_updated_by", referencedColumnName="id")
     * })
     */
    private $preUsrUpdatedBy;



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
     * Set preNombre
     *
     * @param string $preNombre
     *
     * @return PlPremio
     */
    public function setPreNombre($preNombre)
    {
        $this->preNombre = $preNombre;

        return $this;
    }

    /**
     * Get preNombre
     *
     * @return string
     */
    public function getPreNombre()
    {
        return $this->preNombre;
    }

    /**
     * Set preCreatedAt
     *
     * @param \DateTime $preCreatedAt
     *
     * @return PlPremio
     */
    public function setPreCreatedAt($preCreatedAt)
    {
        $this->preCreatedAt = $preCreatedAt;

        return $this;
    }

    /**
     * Get preCreatedAt
     *
     * @return \DateTime
     */
    public function getPreCreatedAt()
    {
        return $this->preCreatedAt;
    }

    /**
     * Set preUpdatedAt
     *
     * @param \DateTime $preUpdatedAt
     *
     * @return PlPremio
     */
    public function setPreUpdatedAt($preUpdatedAt)
    {
        $this->preUpdatedAt = $preUpdatedAt;

        return $this;
    }

    /**
     * Get preUpdatedAt
     *
     * @return \DateTime
     */
    public function getPreUpdatedAt()
    {
        return $this->preUpdatedAt;
    }

    /**
     * Set preActive
     *
     * @param boolean $preActive
     *
     * @return PlPremio
     */
    public function setPreActive($preActive)
    {
        $this->preActive = $preActive;

        return $this;
    }

    /**
     * Get preActive
     *
     * @return boolean
     */
    public function getPreActive()
    {
        return $this->preActive;
    }

    /**
     * Set prePa
     *
     * @param \PylifeBundle\Entity\PlPais $prePa
     *
     * @return PlPremio
     */
    public function setPrePa(\PylifeBundle\Entity\PlPais $prePa = null)
    {
        $this->prePa = $prePa;

        return $this;
    }

    /**
     * Get prePa
     *
     * @return \PylifeBundle\Entity\PlPais
     */
    public function getPrePa()
    {
        return $this->prePa;
    }

    /**
     * Set preUsrCreatedBy
     *
     * @param \PylifeBundle\Entity\PlUser $preUsrCreatedBy
     *
     * @return PlPremio
     */
    public function setPreUsrCreatedBy(\PylifeBundle\Entity\PlUser $preUsrCreatedBy = null)
    {
        $this->preUsrCreatedBy = $preUsrCreatedBy;

        return $this;
    }

    /**
     * Get preUsrCreatedBy
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getPreUsrCreatedBy()
    {
        return $this->preUsrCreatedBy;
    }

    /**
     * Set preUsrUpdatedBy
     *
     * @param \PylifeBundle\Entity\PlUser $preUsrUpdatedBy
     *
     * @return PlPremio
     */
    public function setPreUsrUpdatedBy(\PylifeBundle\Entity\PlUser $preUsrUpdatedBy = null)
    {
        $this->preUsrUpdatedBy = $preUsrUpdatedBy;

        return $this;
    }

    /**
     * Get preUsrUpdatedBy
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getPreUsrUpdatedBy()
    {
        return $this->preUsrUpdatedBy;
    }
	
	public function __toString(){
		return $this->preNombre;
	}
}
