<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\MerchantRelationship;

use Spryker\Zed\MerchantRelationship\MerchantRelationshipDependencyProvider as SprykerMerchantRelationshipDependencyProvider;
use Spryker\Zed\MerchantRelationshipProductList\Communication\Plugin\MerchantRelationship\ProductListMerchantRelationshipPreDeletePlugin;

class MerchantRelationshipDependencyProvider extends SprykerMerchantRelationshipDependencyProvider
{
    /**
     * @return \Spryker\Zed\MerchantRelationshipExtension\Dependency\Plugin\MerchantRelationshipPreDeletePluginInterface[]
     */
    protected function getMerchantRelationshipPreDeletePlugins(): array
    {
        return [
            new ProductListMerchantRelationshipPreDeletePlugin(),
        ];
    }
}
