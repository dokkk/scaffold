<?php
/**
 * Created by Domenico Caruso.
 * Date: 07.08.18
 * Time: 20:25
 */

namespace Scaffold\Models\Plugin;

use Doctrine\ORM\Mapping as ORM;
use Shopware\Components\Model\ModelEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="scaffold_plugins")
 */
class Plugin extends ModelEntity
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var integer $userId
     *
     * @ORM\Column(name="userId", type="integer", nullable=false)
     */
    private $userId;

    /**
     * @var \Shopware\Models\Customer\Customer
     * @ORM\ManyToOne(targetEntity="\Shopware\Models\Customer\Customer")
     * @ORM\JoinColumn(name="userId", referencedColumnName="id")
     */
    protected $user;

    /**
     * @var \DateTime $creationDate
     *
     * @ORM\Column(name="creationDate", type="datetime", nullable=false)
     */
    private $creationDate;

    /**
     * @var Attribute $attribute
     *
     * @ORM\OneToOne(targetEntity="\Scaffold\Models\Plugin\Attribute", mappedBy="form", orphanRemoval=true, cascade={"persist"})
     */
    protected $attribute;
}