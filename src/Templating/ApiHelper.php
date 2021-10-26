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

namespace Ivory\GoogleMapBundle\Templating;

use Ivory\GoogleMap\Helper\ApiHelper as BaseApiHelper;
use Symfony\Component\Templating\Helper\Helper;

class ApiHelper extends Helper
{
    /** @var BaseApiHelper */
    private $apiHelper;

    public function __construct(BaseApiHelper $apiHelper)
    {
        $this->apiHelper = $apiHelper;
    }

    public function render(array $objects): string
    {
        return $this->apiHelper->render($objects);
    }

    /** {@inheritdoc} */
    public function getName(): string
    {
        return 'ivory_google_api';
    }
}
