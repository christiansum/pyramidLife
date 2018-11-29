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
     *   @ORM\JoinColumn(name="usr_pa_id", referencedColumnName="id")
     * })
     */
    private $usrPa;


}

