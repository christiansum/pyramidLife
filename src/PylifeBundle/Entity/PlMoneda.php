<?php

namespace PylifeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlMoneda
 *
 * @ORM\Table(name="pl_moneda", indexes={@ORM\Index(name="fk_pl_user_pl_moneda_created_idx", columns={"mo_usr_created_by"}), @ORM\Index(name="fk_pl_user_pl_moneda_updated_idx", columns={"mo_usr_updated_by"})})
 * @ORM\Entity
 */
class PlMoneda
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
     * @ORM\Column(name="mo_nombre", type="string", length=70, nullable=false)
     */
    private $moNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="mo_simbolo", type="string", length=10, nullable=false)
     */
    private $moSimbolo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="mo_created_at", type="datetime", nullable=false)
     */
    private $moCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="mo_updated_at", type="datetime", nullable=true)
     */
    private $moUpdatedAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="mo_active", type="boolean", nullable=false)
     */
    private $moActive = '1';

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mo_usr_created_by", referencedColumnName="id")
     * })
     */
    private $moUsrCreatedBy;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mo_usr_updated_by", referencedColumnName="id")
     * })
     */
    private $moUsrUpdatedBy;



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
     * Set moNombre
     *
     * @param string $moNombre
     *
     * @return PlMoneda
     */
    public function setMoNombre($moNombre)
    {
        $this->moNombre = $moNombre;

        return $this;
    }

    /**
     * Get moNombre
     *
     * @return string
     */
    public function getMoNombre()
    {
        return $this->moNombre;
    }

    /**
     * Set moSimbolo
     *
     * @param string $moSimbolo
     *
     * @return PlMoneda
     */
    public function setMoSimbolo($moSimbolo)
    {
        $this->moSimbolo = $moSimbolo;

        return $this;
    }

    /**
     * Get moSimbolo
     *
     * @return string
     */
    public function getMoSimbolo()
    {
        return $this->moSimbolo;
    }

    /**
     * Set moCreatedAt
     *
     * @param \DateTime $moCreatedAt
     *
     * @return PlMoneda
     */
    public function setMoCreatedAt($moCreatedAt)
    {
        $this->moCreatedAt = $moCreatedAt;

        return $this;
    }

    /**
     * Get moCreatedAt
     *
     * @return \DateTime
     */
    public function getMoCreatedAt()
    {
        return $this->moCreatedAt;
    }

    /**
     * Set moUpdatedAt
     *
     * @param \DateTime $moUpdatedAt
     *
     * @return PlMoneda
     */
    public function setMoUpdatedAt($moUpdatedAt)
    {
        $this->moUpdatedAt = $moUpdatedAt;

        return $this;
    }

    /**
     * Get moUpdatedAt
     *
     * @return \DateTime
     */
    public function getMoUpdatedAt()
    {
        return $this->moUpdatedAt;
    }

    /**
     * Set moActive
     *
     * @param boolean $moActive
     *
     * @return PlMoneda
     */
    public function setMoActive($moActive)
    {
        $this->moActive = $moActive;

        return $this;
    }

    /**
     * Get moActive
     *
     * @return boolean
     */
    public function getMoActive()
    {
        return $this->moActive;
    }

    /**
     * Set moUsrCreatedBy
     *
     * @param \PylifeBundle\Entity\PlUser $moUsrCreatedBy
     *
     * @return PlMoneda
     */
    public function setMoUsrCreatedBy(\PylifeBundle\Entity\PlUser $moUsrCreatedBy = null)
    {
        $this->moUsrCreatedBy = $moUsrCreatedBy;

        return $this;
    }

    /**
     * Get moUsrCreatedBy
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getMoUsrCreatedBy()
    {
        return $this->moUsrCreatedBy;
    }

    /**
     * Set moUsrUpdatedBy
     *
     * @param \PylifeBundle\Entity\PlUser $moUsrUpdatedBy
     *
     * @return PlMoneda
     */
    public function setMoUsrUpdatedBy(\PylifeBundle\Entity\PlUser $moUsrUpdatedBy = null)
    {
        $this->moUsrUpdatedBy = $moUsrUpdatedBy;

        return $this;
    }

    /**
     * Get moUsrUpdatedBy
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getMoUsrUpdatedBy()
    {
        return $this->moUsrUpdatedBy;
    }
}
