<?php

namespace Jungi\OrmBundle\DependencyInjection;

use Jungi\Orm\Mapping\Loader\PhpFileLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

/**
 * @author Piotr Kugla <piku235@gmail.com>
 */
final class JungiOrmExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../../resources/config'));
        $loader->load('services.xml');

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $phpFileLoader = $container->getDefinition(PhpFileLoader::class);
        $phpFileLoader->setArgument(0, $config['mapping_dirs']);
        $phpFileLoader->setArgument(1, $config['mapping_dir']);
    }
}
