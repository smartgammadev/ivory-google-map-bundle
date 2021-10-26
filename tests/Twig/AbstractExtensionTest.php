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

use PHPUnit\Framework\TestCase;
use Twig\Environment;
use Twig\Extension\ExtensionInterface;
use Twig\Loader\FilesystemLoader;

abstract class AbstractExtensionTest extends TestCase
{
    /** @var Environment */
    private $twig;

    /** {@inheritdoc} */
    protected function setUp(): void
    {
        $this->twig = new Environment(new FilesystemLoader([]));
        $this->twig->addExtension($this->createExtension());
    }

    abstract protected function createExtension(): ExtensionInterface;

    protected function getTwig(): Environment
    {
        return $this->twig;
    }
}
