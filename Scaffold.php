<?php
/**
 * Created by Domenico Caruso.
 * Date: 07.08.18
 * Time: 20:25
 */

namespace Scaffold;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\DBAL\Schema\AbstractSchemaManager;
use Doctrine\ORM\Tools\SchemaTool;
use Enlight_Controller_ActionEventArgs;
use ReplyArticleReservations\Commands\DeleteReservationCommand;
use ReplyArticleReservations\Models\Reservation\Reservation;
use ReplyArticleReservations\Services\DeleteReservation;
use Shopware\Bundle\AttributeBundle\Service\CrudService;
use Shopware\Bundle\AttributeBundle\Service\TypeMapping;
use Shopware\Components\Console\Application;
use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\InstallContext;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class Scaffold extends Plugin
{
    /**
     *
     * @param InstallContext $context
     * @return void
     * @throws \Exception
     */
    public function install(InstallContext $context)
    {
        $this->addSnippetDirectory();
        $this->createSchema();
        $context->scheduleClearCache(InstallContext::CACHE_LIST_ALL);

    }

    /**
     * Builds the Plugin and adds the plugin path to the container
     *
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        $container->setParameter('scaffold.plugin_dir', $this->getPath());
        parent::build($container);
    }

    /**
     * @throws \Doctrine\ORM\Tools\ToolsException
     */
    private function createSchema()
    {
        $models = $this->container->get('models');
        $tool = new SchemaTool($models);
        $tables = [
            'scaffold_plugins' => $models->getClassMetadata(\Scaffold\Models\Plugin\Plugin::class),
            'scaffold_plugins_attributes' => $models->getClassMetadata(\Scaffold\Models\Plugin\Attribute::class)
        ];
        /** @var AbstractSchemaManager $schemaManager */
        $schemaManager = $models->getConnection()->getSchemaManager();
        foreach ($tables as $tableName => $class) {
            if ($schemaManager->tablesExist([$tableName])) {
                $tool->updateSchema([$class], true);//true - saveMode and not delete other schemas
            } else {
                $tool->createSchema([$class]);
            }
        }
    }

    /**
     * Add snippet directory if exist (for backend and frontend)
     *
     * @return void
     */
    public function addSnippetDirectory()
    {
        if (@is_dir($this->getPath() . '/Resources/snippets')) {
            Shopware()->Snippets()->addConfigDir('/Resources/snippets');
        }
    }

    /**
     * Register the new Commands
     *
     * @param Application $application
     * @internal param ContainerBuilder $container
     */
    public function registerCommands(Application $application)
    {
        //$application->add(new DeleteReservationCommand());
    }

}