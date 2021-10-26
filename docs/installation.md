# Installation

To install the Ivory Google Map bundle, you will need [Composer](http://getcomposer.org).

## Set up Composer

Composer comes with a simple phar file. To easily access it from anywhere on your system, you can execute:

``` bash
$ curl -s https://getcomposer.org/installer | php
$ sudo mv composer.phar /usr/local/bin/composer
```

## Download the bundle

Require the library in your `composer.json` file:

``` bash
$ composer require ivory/google-map-bundle
```

## Download additional libraries

If you want to use the [Direction](/docs/service/direction.md), 
[Distance Matrix](/docs/service/distance_matrix.md), [Elevation](/docs/service/elevation.md), 
[Geocoder](/docs/service/geocoder.md), [Place](/docs/service/place/index.md) or 
[Time Zone](/docs/service/time_zone.md) services, you will need a http client and message factory which implements [PSR-7](https://www.php-fig.org/psr/psr-7/) like [php-http/guzzle7-adapter](https://packagist.org/packages/php-http/guzzle7-adapter) as well as the 
[Ivory Serializer](https://github.com/bresam/ivory-serializer) which is an advanced (de)-serialization library. 

[php-http/guzzle7-adapter](https://packagist.org/packages/php-http/guzzle7-adapter) and [Ivory Serializer](https://github.com/bresam/ivory-serializer-bundle) provide bundles, so 
let's install them to ease our life:

``` bash
$ composer require ivory/serializer-bundle
$ composer require php-http/guzzle7-adapter
```

## Register the bundle

Then, add the bundle in your `AppKernel`, which is not needed with flex:

``` php
// app/AppKernel.php

public function registerBundles()
{
    return [
        // ...
        new Ivory\GoogleMapBundle\IvoryGoogleMapBundle(),
        
        // Optionally
        new Ivory\SerializerBundle\IvorySerializerBundle(),
    ];
}
```
