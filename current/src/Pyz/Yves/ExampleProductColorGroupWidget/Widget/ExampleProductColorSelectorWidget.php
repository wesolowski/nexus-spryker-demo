<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ExampleProductColorGroupWidget\Widget;

use Spryker\Yves\Kernel\Widget\AbstractWidget;
use SprykerShop\Yves\ProductGroupWidget\Widget\ProductGroupWidget;

class ExampleProductColorSelectorWidget extends AbstractWidget
{
    /**
     * @param int $idProductAbstract
     * @param string|null $wrapper
     */
    public function __construct(int $idProductAbstract, ?string $wrapper = null)
    {
        $widget = new ProductGroupWidget($idProductAbstract);

        $this->parameters = $widget->getParameters();
        $this->addParameter('wrapper', $wrapper);
    }

    /**
     * @return string
     */
    public static function getName(): string
    {
        return 'ExampleProductColorSelectorWidget';
    }

    /**
     * @return string
     */
    public static function getTemplate(): string
    {
        return '@ExampleProductColorGroupWidget/views/product-color-selector/product-color-selector.twig';
    }
}
