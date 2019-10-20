<?php

namespace Jungi\OrmBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @author Piotr Kugla <piku235@gmail.com>
 */
final class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $tb = new TreeBuilder('jungi_orm');

        $rootNode = $tb->getRootNode();
        $rootNode
            ->children()
                ->scalarNode('mapping_dir')->defaultNull()->end()
                ->arrayNode('mapping_dirs')
                    ->defaultValue([])
                    ->useAttributeAsKey('prefix')
                    ->prototype('scalar')->end()
                ->end()
            ->end();

        return $tb;
    }
}
