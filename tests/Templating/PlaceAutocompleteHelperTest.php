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

namespace Ivory\GoogleMapBundle\Tests\Templating;

use Ivory\GoogleMap\Helper\PlaceAutocompleteHelper as BasePlaceAutocompleteHelper;
use Ivory\GoogleMap\Place\Autocomplete;
use Ivory\GoogleMapBundle\Templating\PlaceAutocompleteHelper;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class PlaceAutocompleteHelperTest extends TestCase
{
    /** @var PlaceAutocompleteHelper */
    private $placeAutocompleteHelper;

    /** @var BasePlaceAutocompleteHelper|MockObject */
    private $innerPlaceAutocompleteHelper;

    /** {@inheritdoc} */
    protected function setUp(): void
    {
        $this->innerPlaceAutocompleteHelper = $this->createPlaceAutocompleteHelperMock();
        $this->placeAutocompleteHelper = new PlaceAutocompleteHelper($this->innerPlaceAutocompleteHelper);
    }

    public function testRender(): void
    {
        $this->innerPlaceAutocompleteHelper
            ->expects($this->once())
            ->method('render')
            ->with($this->identicalTo($autocomplete = $this->createAutocompleteMock()))
            ->will($this->returnValue($result = 'result'));

        $this->assertSame($result, $this->placeAutocompleteHelper->render($autocomplete));
    }

    public function testRenderHtml(): void
    {
        $this->innerPlaceAutocompleteHelper
            ->expects($this->once())
            ->method('renderHtml')
            ->with($this->identicalTo($autocomplete = $this->createAutocompleteMock()))
            ->will($this->returnValue($result = 'result'));

        $this->assertSame($result, $this->placeAutocompleteHelper->renderHtml($autocomplete));
    }

    public function testRenderJavascript(): void
    {
        $this->innerPlaceAutocompleteHelper
            ->expects($this->once())
            ->method('renderJavascript')
            ->with($this->identicalTo($autocomplete = $this->createAutocompleteMock()))
            ->will($this->returnValue($result = 'result'));

        $this->assertSame($result, $this->placeAutocompleteHelper->renderJavascript($autocomplete));
    }

    public function testName(): void
    {
        $this->assertSame('ivory_google_place_autocomplete', $this->placeAutocompleteHelper->getName());
    }

    /** @return MockObject|BasePlaceAutocompleteHelper */
    private function createPlaceAutocompleteHelperMock()
    {
        return $this->createMock(BasePlaceAutocompleteHelper::class);
    }

    /** @return MockObject|Autocomplete */
    private function createAutocompleteMock()
    {
        return $this->createMock(Autocomplete::class);
    }
}
