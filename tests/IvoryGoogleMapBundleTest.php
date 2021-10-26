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

namespace Ivory\GoogleMapBundle\Tests;

use Ivory\GoogleMapBundle\IvoryGoogleMapBundle;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class IvoryGoogleMapBundleTest extends TestCase
{
    /** @var IvoryGoogleMapBundle */
    private $bundle;

    /** {@inheritdoc} */
    protected function setUp(): void
    {
        $this->bundle = new IvoryGoogleMapBundle();
    }

    public function testBundle(): void
    {
        $this->assertInstanceOf(Bundle::class, $this->bundle);
    }
}
