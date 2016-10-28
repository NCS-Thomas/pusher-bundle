<?php

namespace Lsv\PusherBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('lsv_pusher');
        $rootNode
            ->children()
                ->scalarNode('app_id')
                    ->info('Your pusher app_id')
                    ->isRequired()
                ->end()
                ->scalarNode('key')
                    ->info('Your pusher app_key')
                    ->isRequired()
                ->end()
                ->scalarNode('secret')
                    ->info('Your pusher secret')
                    ->isRequired()
                ->end()
                ->scalarNode('host')
                    ->info('The host e.g. api.pusherapp.com')
                    ->defaultValue('api.pusherapp.com')
                ->end()
                ->integerNode('timeout')
                    ->info('the HTTP timeout')
                    ->defaultFalse()
                ->end()
                ->booleanNode('encrypted')
                    ->info('If you want to send messages over encrypted https')
                    ->defaultFalse()
                ->end()
                ->scalarNode('cluster')
                    ->info('Which pusher cluster do you want to use, this overrides the host option')
                    ->defaultFalse()
                ->end()
                ->arrayNode('curl_options')
                    ->info('Array of curl options you want to use')
                    ->prototype('scalar')
                    ->end()
                ->end()
                ->booleanNode('debug')
                    ->info('Debug messages')
                    ->defaultFalse()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
