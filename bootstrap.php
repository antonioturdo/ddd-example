<?php

require_once __DIR__.'/vendor/autoload.php';

$containerBuilder = new \Symfony\Component\DependencyInjection\ContainerBuilder();
$loader = new \Symfony\Component\DependencyInjection\Loader\YamlFileLoader($containerBuilder, new \Symfony\Component\Config\FileLocator(__DIR__));
// $loader->load('config/parameters.yaml');
$loader->load('config/services.yaml');
// $envPass = new \Symfony\Component\DependencyInjection\Compiler\ResolveEnvPlaceholdersPass();
// $containerBuilder->addCompilerPass($envPass, PassConfig::TYPE_AFTER_REMOVING, -1000);

$containerBuilder->compile();

