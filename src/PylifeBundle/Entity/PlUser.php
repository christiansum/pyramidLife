<?php

namespace PylifeBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * PlUser
 *
 * @ORM\Table(name="pl_user", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_18A6913B92FC23A8", columns={"username_canonical"}), @ORM\UniqueConstraint(name="UNIQ_18A6913BA0D96FBF", columns={"email_canonical"}), @ORM\UniqueConstraint(name="UNIQ_18A6913BC05FB297", columns={"confirmation_token"})}, indexes={@ORM\Index(name="fk_pl_pais_pl_pais_idx", columns={"usr_pa_id"})})
 * @ORM\Entity
 */
class PlUser extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="usr_nombre", type="string", length=100, nullable=true)
     */
    private $usrNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="usr_apellido", type="string", length=100, nullable=true)
     */
    private $usrApellido;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="usr_fecha_nacimiento", type="datetime", nullable=true)
     */
    private $usrFechaNacimiento;

    /**
     * @var integer
     *
     * @ORM\Column(name="usr_nit", type="integer", nullable=true)
     */
    private $usrNit;

    /**
     * @var string
     *
     * @ORM\Column(name="usr_direccion", type="string", length=200, nullable=true)
     */
    private $usrDireccion;
    
    /**
     * @var \PylifeBundle\Entity\PlPais
     *
     * @ORM\ManyToOne(targetEntity="PylifeBundle\Entity\PlPais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usr_pzzza_id", referencedColumnName="id")
     * })
     */
    private $usrPa;



    /**
     * Set usrNombre
     *
     * @param string $usrNombre
     *
     * @return PlUser
     */
    public function setUsrNombre($usrNombre)
    {
        $this->usrNombre = $usrNombre;

        return $this;
    }

    /**
     * Get usrNombre
     *
     * @return string
     */
    public function getUsrNombre()
    {
        return $this->usrNombre;
    }

    /**
     * Set usrApellido
     *
     * @param string $usrApellido
     *
     * @return PlUser
     */
    public function setUsrApellido($usrApellido)
    {
        $this->usrApellido = $usrApellido;

        return $this;
    }

    /**
     * Get usrApellido
     *
     * @return string
     */
    public function getUsrApellido()
    {
        return $this->usrApellido;
    }

    /**
     * Set usrFechaNacimiento
     *
     * @param \DateTime $usrFechaNacimiento
     *
     * @return PlUser
     */
    public function setUsrFechaNacimiento($usrFechaNacimiento)
    {
        $this->usrFechaNacimiento = $usrFechaNacimiento;

        return $this;
    }

    /**
     * Get usrFechaNacimiento
     *
     * @return \DateTime
     */
    public function getUsrFechaNacimiento()
    {
        return $this->usrFechaNacimiento;
    }

    /**
     * Set usrNit
     *
     * @param integer $usrNit
     *
     * @return PlUser
     */
    public function setUsrNit($usrNit)
    {
        $this->usrNit = $usrNit;

        return $this;
    }

    /**
     * Get usrNit
     *
     * @return integer
     */
    public function getUsrNit()
    {
        return $this->usrNit;
    }

    /**
     * Set usrDireccion
     *
     * @param string $usrDireccion
     *
     * @return PlUser
     */
    public function setUsrDireccion($usrDireccion)
    {
        $this->usrDireccion = $usrDireccion;

        return $this;
    }

    /**
     * Get usrDireccion
     *
     * @return string
     */
    public function getUsrDireccion()
    {
        return $this->usrDireccion;
    }

    /**
     * Set usrPa
     *
     * @param \PylifeBundle\Entity\PlPais $usrPa
     *
     * @return PlUser
     */
    public function setUsrPa(\PylifeBundle\Entity\PlPais $usrPa = null)
    {
        $this->usrPa = $usrPa;

        return $this;
    }

    /**
     * Get usrPa
     *
     * @return \PylifeBundle\Entity\PlPais
     */
    public function getUsrPa()
    {
        return $this->usrPa;
    }
}
