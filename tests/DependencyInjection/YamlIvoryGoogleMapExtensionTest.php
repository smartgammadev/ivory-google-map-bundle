<?php

declare(strict_types=1);

/*
 * This file is part of the Ivory Google Map bundle package.
 *
 * (c) Eric GELOEN <geloen.eric@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Ivory\GoogleMapBundle\Tests\DependencyInjection;

use Exception;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class YamlIvoryGoogleMapExtensionTest extends AbstractIvoryGoogleMapExtensionTest
{
    /** @throws Exception */
    protected function loadConfiguration(ContainerBuilder $container, $configuration): void
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Fixtures/Config/Yaml'));
        $loader->load($configuration.'.yml');
    }
}
