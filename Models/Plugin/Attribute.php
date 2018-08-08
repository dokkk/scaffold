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
 * @ORM\Table(name="scaffold_plugins_attributes")
 */
class Attribute extends ModelEntity
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer $pluginId
     *
     * @ORM\Column(name="pluginId", type="integer", nullable=false)
     */
    private $pluginId;

    /**
     * @var \Scaffold\Models\Plugin\Plugin $plugin
     * @ORM\OneToOne(targetEntity="Plugin", inversedBy="attribute")
     * @ORM\JoinColumn(name="pluginId", referencedColumnName="id")
     */
    protected $plugin;

    /**
     * @var string $label
     *
     * @ORM\Column(name="label", type="string", length=255, nullable=false)
     */
    private $label;

    /**
     * @var string $copyright
     *
     * @ORM\Column(name="copyright", type="string", length=255, nullable=true)
     */
    private $copyright;

    /**
     * @var string $link
     *
     * @ORM\Column(name="link", type="string", length=255, nullable=true)
     */
    private $link;

    /**
     * @var string $author
     *
     * @ORM\Column(name="author", type="string", length=255, nullable=true)
     */
    private $author;

    /**
     * @var string $description
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var array $folders
     *
     * @ORM\Column(name="folders", type="string", length=2048, nullable=true)
     */
    private $folders;

    /**
     * @var array $files
     *
     * @ORM\Column(name="files", type="string", length=2048, nullable=true)
     */
    private $files;
}