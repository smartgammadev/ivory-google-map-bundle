<?php

declare(strict_types=1);

/*
 * This file is part of the Ivory Google Map package.
 *
 * (c) Eric GELOEN <geloen.eric@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Ivory\GoogleMapBundle\Tests\Helper;

use Ivory\GoogleMap\Helper\ApiHelper;
use Ivory\GoogleMap\Helper\MapHelper;
use Ivory\GoogleMap\Helper\PlaceAutocompleteHelper;
use Ivory\GoogleMap\Helper\StaticMapHelper;
use Ivory\GoogleMapBundle\DependencyInjection\IvoryGoogleMapExtension;
use Ivory\GoogleMapBundle\IvoryGoogleMapBundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ContainerInterface;

class HelperFactory
{
    /** @var ContainerInterface */
    private static $container;

    public static function createApiHelper(): ApiHelper
    {
        return self::getContainer()->get('ivory.google_map.helper.api');
    }

    public static function createMapHelper(): MapHelper
    {
        return self::getContainer()->get('ivory.google_map.helper.map');
    }

    public static function createStaticMapHelper(): StaticMapHelper
    {
        return self::getContainer()->get('ivory.google_map.helper.map.static');
    }

    public static function createPlaceAutocompleteHelper(): PlaceAutocompleteHelper
    {
        return self::getContainer()->get('ivory.google_map.helper.place_autocomplete');
    }

    private static function getContainer(): ContainerInterface
    {
        if (null !== self::$container) {
            return self::$container;
        }

        $config = [];

        if (isset($_SERVER['API_KEY'])) {
            $config['static_map']['api_key'] = $_SERVER['API_KEY'];
        }

        $container = new ContainerBuilder();
        $container->setParameter('kernel.default_locale', 'en');
        $container->setParameter('kernel.debug', false);

        if (!empty($config)) {
            $container->prependExtensionConfig('ivory_google_map', $config);
        }

        $container->registerExtension($extension = new IvoryGoogleMapExtension());
        $container->loadFromExtension($extension->getAlias());
        (new IvoryGoogleMapBundle())->build($container);

        $container->compile();

        return self::$container = $container;
    }
}
