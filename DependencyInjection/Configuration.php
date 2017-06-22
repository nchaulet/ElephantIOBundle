<?php

namespace Nc\Bundle\ElephantIOBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('nc_elephant_io');

        $rootNode
            ->children()
                ->arrayNode('clients')
                    ->prototype('array')
                        ->children()
                            ->scalarNode('connection')->isRequired()->end()
                            ->scalarNode('version')
                                ->defaultValue('2.x')
                                ->validate()
                                    ->ifNotInArray(array('2.x', '1.x', '0.x'))
                                        ->thenInvalid('Invalid version number "%s"')
                                    ->end()
                            ->end()
                        ->end()
                ->end()
            ->end()
        ->end();

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        return $treeBuilder;
    }
}
