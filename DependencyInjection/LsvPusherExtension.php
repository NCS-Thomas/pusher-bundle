<?php

namespace Lsv\PusherBundle\DependencyInjection;

use Lsv\PusherBundle\DataCollector\TriggerCollector;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class LsvPusherExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('lsv_pusher.key', $config['key']);
        $container->setParameter('lsv_pusher.secret', $config['secret']);
        $container->setParameter('lsv_pusher.app_id', $config['app_id']);
        $container->setParameter('lsv_pusher.configuration', $this->getArguments($config));

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }

    /**
     * @param array $config
     * @return array
     */
    private function getArguments(array $config)
    {
        $arguments = [];
        if ($config['timeout']) {
            $arguments['timeout'] = $config['timeout'];
        }

        if ($config['encrypted']) {
            $arguments['encrypted'] = $config['encrypted'];
        }

        $arguments['host'] = rtrim($config['host'], '/');
        $arguments['scheme'] = $config['encrypted'] ? 'https' : 'http';
        $arguments['port'] = $config['encrypted'] ? 443 : 80;

        if ($config['cluster']) {
            $arguments['cluster'] = $config['cluster'];
            unset($arguments['host']);
        }

        if ($config['curl_options']) {
            $options = [];
            foreach ($config['curl_options'] as $key => $value) {
                if (defined($key)) {
                    $key = constant($key);
                }

                if (defined($value)) {
                    $value = constant($value);
                }

                $options[$key] = $value;
            }
            $arguments['curl_options'] = $options;
        }

        if ($config['debug']) {
            $arguments['debug'] = true;
        }

        return $arguments;
    }

}
