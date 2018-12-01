<?php

namespace PylifeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlTipoPenalizacion
 *
 * @ORM\Table(name="pl_tipo_penalizacion", indexes={@ORM\Index(name="fk_pl_user_pl_tipo_penalizacion_created_idx", columns={"pti_usr_created_by"}), @ORM\Index(name="fk_pl_user_pl_tipo_penalizacion_updated_idx", columns={"pti_usr_updated_by"})})
 * @ORM\Entity
 */
class PlTipoPenalizacion
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
     * @ORM\Column(name="pti_nombre", type="string", length=70, nullable=false)
     */
    private $ptiNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="pti_nombre_maquina", type="string", length=45, nullable=false)
     */
    private $ptiNombreMaquina;

    /**
     * @var integer
     *
     * @ORM\Column(name="pti_valor", type="integer", nullable=false)
     */
    private $ptiValor;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pti_created_at", type="datetime", nullable=false)
     */
    private $ptiCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pti_updated_at", type="datetime", nullable=true)
     */
    private $ptiUpdatedAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pti_active", type="boolean", nullable=false)
     */
    private $ptiActive = '1';

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pti_usr_created_by", referencedColumnName="id")
     * })
     */
    private $ptiUsrCreatedBy;

    /**
     * @var \PylifeBundle\Entity\PlUser
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pti_usr_updated_by", referencedColumnName="id")
     * })
     */
    private $ptiUsrUpdatedBy;



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
     * Set ptiNombre
     *
     * @param string $ptiNombre
     *
     * @return PlTipoPenalizacion
     */
    public function setPtiNombre($ptiNombre)
    {
        $this->ptiNombre = $ptiNombre;

        return $this;
    }

    /**
     * Get ptiNombre
     *
     * @return string
     */
    public function getPtiNombre()
    {
        return $this->ptiNombre;
    }

    /**
     * Set ptiNombreMaquina
     *
     * @param string $ptiNombreMaquina
     *
     * @return PlTipoPenalizacion
     */
    public function setPtiNombreMaquina($ptiNombreMaquina)
    {
        $this->ptiNombreMaquina = $ptiNombreMaquina;

        return $this;
    }

    /**
     * Get ptiNombreMaquina
     *
     * @return string
     */
    public function getPtiNombreMaquina()
    {
        return $this->ptiNombreMaquina;
    }

    /**
     * Set ptiValor
     *
     * @param integer $ptiValor
     *
     * @return PlTipoPenalizacion
     */
    public function setPtiValor($ptiValor)
    {
        $this->ptiValor = $ptiValor;

        return $this;
    }

    /**
     * Get ptiValor
     *
     * @return integer
     */
    public function getPtiValor()
    {
        return $this->ptiValor;
    }

    /**
     * Set ptiCreatedAt
     *
     * @param \DateTime $ptiCreatedAt
     *
     * @return PlTipoPenalizacion
     */
    public function setPtiCreatedAt($ptiCreatedAt)
    {
        $this->ptiCreatedAt = $ptiCreatedAt;

        return $this;
    }

    /**
     * Get ptiCreatedAt
     *
     * @return \DateTime
     */
    public function getPtiCreatedAt()
    {
        return $this->ptiCreatedAt;
    }

    /**
     * Set ptiUpdatedAt
     *
     * @param \DateTime $ptiUpdatedAt
     *
     * @return PlTipoPenalizacion
     */
    public function setPtiUpdatedAt($ptiUpdatedAt)
    {
        $this->ptiUpdatedAt = $ptiUpdatedAt;

        return $this;
    }

    /**
     * Get ptiUpdatedAt
     *
     * @return \DateTime
     */
    public function getPtiUpdatedAt()
    {
        return $this->ptiUpdatedAt;
    }

    /**
     * Set ptiActive
     *
     * @param boolean $ptiActive
     *
     * @return PlTipoPenalizacion
     */
    public function setPtiActive($ptiActive)
    {
        $this->ptiActive = $ptiActive;

        return $this;
    }

    /**
     * Get ptiActive
     *
     * @return boolean
     */
    public function getPtiActive()
    {
        return $this->ptiActive;
    }

    /**
     * Set ptiUsrCreatedBy
     *
     * @param \PylifeBundle\Entity\PlUser $ptiUsrCreatedBy
     *
     * @return PlTipoPenalizacion
     */
    public function setPtiUsrCreatedBy(\PylifeBundle\Entity\PlUser $ptiUsrCreatedBy = null)
    {
        $this->ptiUsrCreatedBy = $ptiUsrCreatedBy;

        return $this;
    }

    /**
     * Get ptiUsrCreatedBy
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getPtiUsrCreatedBy()
    {
        return $this->ptiUsrCreatedBy;
    }

    /**
     * Set ptiUsrUpdatedBy
     *
     * @param \PylifeBundle\Entity\PlUser $ptiUsrUpdatedBy
     *
     * @return PlTipoPenalizacion
     */
    public function setPtiUsrUpdatedBy(\PylifeBundle\Entity\PlUser $ptiUsrUpdatedBy = null)
    {
        $this->ptiUsrUpdatedBy = $ptiUsrUpdatedBy;

        return $this;
    }

    /**
     * Get ptiUsrUpdatedBy
     *
     * @return \PylifeBundle\Entity\PlUser
     */
    public function getPtiUsrUpdatedBy()
    {
        return $this->ptiUsrUpdatedBy;
    }
}
