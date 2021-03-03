<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Currency;

use Spryker\Client\CartCurrencyConnector\CurrencyChange\CartUpdateCurrencyOnCurrencyChangePlugin;
use Spryker\Client\Currency\CurrencyDependencyProvider as SprykerCurrencyDependencyProvider;

class CurrencyDependencyProvider extends SprykerCurrencyDependencyProvider
{
    /**
     * @return \Spryker\Client\CurrencyExtension\Dependency\CurrencyPostChangePluginInterface[]
     */
    protected function getCurrencyPostChangePlugins(): array
    {
        return [
            new CartUpdateCurrencyOnCurrencyChangePlugin(),
        ];
    }
}
