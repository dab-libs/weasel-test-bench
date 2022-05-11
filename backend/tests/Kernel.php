<?php

namespace Weasel\TestBench\Tests;

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

class Kernel extends \Weasel\TestBench\Kernel {
  protected function configureContainer(ContainerConfigurator $container): void {
    parent::configureContainer($container);
    $container->import('./**/Config/services.yaml');
  }
}