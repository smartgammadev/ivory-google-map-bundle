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

namespace Ivory\GoogleMapBundle\Tests\Twig;

use Ivory\GoogleMap\Helper\MapHelper;
use Ivory\GoogleMap\Map;
use Ivory\GoogleMapBundle\Twig\MapExtension;
use PHPUnit\Framework\MockObject\MockObject;
use Twig\Extension\ExtensionInterface;

class MapExtensionTest extends AbstractExtensionTest
{
    /** @var MapHelper|MockObject */
    private $mapHelper;

    protected function createExtension(): ExtensionInterface
    {
        $this->mapHelper = $this->createMapHelperMock();

        return new MapExtension($this->mapHelper);
    }

    public function testRender(): void
    {
        $template = $this->getTwig()->createTemplate('{{ ivory_google_map(map) }}');

        $this->mapHelper
            ->expects($this->once())
            ->method('render')
            ->with($this->identicalTo($map = $this->createMapMock()))
            ->will($this->returnValue($result = 'result'));

        $this->assertSame($result, $template->render(['map' => $map]));
    }

    public function testRenderHtml(): void
    {
        $template = $this->getTwig()->createTemplate('{{ ivory_google_map_container(map) }}');

        $this->mapHelper
            ->expects($this->once())
            ->method('renderHtml')
            ->with($this->identicalTo($map = $this->createMapMock()))
            ->will($this->returnValue($result = 'result'));

        $this->assertSame($result, $template->render(['map' => $map]));
    }

    public function testRenderStylesheet(): void
    {
        $template = $this->getTwig()->createTemplate('{{ ivory_google_map_css(map) }}');

        $this->mapHelper
            ->expects($this->once())
            ->method('renderStylesheet')
            ->with($this->identicalTo($map = $this->createMapMock()))
            ->will($this->returnValue($result = 'result'));

        $this->assertSame($result, $template->render(['map' => $map]));
    }

    public function testRenderJavascript(): void
    {
        $template = $this->getTwig()->createTemplate('{{ ivory_google_map_js(map) }}');

        $this->mapHelper
            ->expects($this->once())
            ->method('renderJavascript')
            ->with($this->identicalTo($map = $this->createMapMock()))
            ->will($this->returnValue($result = 'result'));

        $this->assertSame($result, $template->render(['map' => $map]));
    }

    /** @return MockObject|MapHelper */
    private function createMapHelperMock()
    {
        return $this->createMock(MapHelper::class);
    }

    /** @return MockObject|Map */
    private function createMapMock()
    {
        return $this->createMock(Map::class);
    }
}
