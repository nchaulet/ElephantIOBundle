<?php

namespace Nc\Bundle\ElephantIOBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;


/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class NcElephantIOExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        if (isset($config['clients']) && is_array($config['clients'])) {
            foreach ($config['clients'] as $name => $client) {
                $this->loadClient($name, $client, $container);
            }
        }
    }

    /**
    * Load client form config
    * @param string           $name      client name
    * @param array            $config    client config
    * @param ContainerBuilder $container client name
    *
    */
    protected function loadClient($name, array $config, ContainerBuilder $container)
    {
        $definitionIo = new Definition('ElephantIO\Client');
        $definitionIo->addArgument($config['connection']);
        $container->setDefinition('elephant_client.elephantio.'.$name, $definitionIo);

        $definition = new Definition('Nc\Bundle\ElephantIOBundle\Service\Client');
        $definition->addArgument(new Reference('elephant_client.elephantio.'.$name));

        $container->setDefinition('elephantio_client.'.$name, $definition);
    }
}
