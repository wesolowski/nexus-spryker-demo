<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Synchronization;

use Spryker\Zed\AvailabilityStorage\Communication\Plugin\Synchronization\AvailabilitySynchronizationDataPlugin;
use Spryker\Zed\CategoryImageStorage\Communication\Plugin\Synchronization\CategoryImageSynchronizationDataPlugin;
use Spryker\Zed\CategoryPageSearch\Communication\Plugin\Synchronization\CategoryPageSynchronizationDataPlugin;
use Spryker\Zed\CategoryStorage\Communication\Plugin\Synchronization\CategoryNodeSynchronizationDataPlugin;
use Spryker\Zed\CategoryStorage\Communication\Plugin\Synchronization\CategoryTreeSynchronizationDataPlugin;
use Spryker\Zed\CmsBlockCategoryStorage\Communication\Plugin\Synchronization\CmsBlockCategorySynchronizationDataPlugin;
use Spryker\Zed\CmsBlockProductStorage\Communication\Plugin\Synchronization\CmsBlockProductSynchronizationDataPlugin;
use Spryker\Zed\CmsBlockStorage\Communication\Plugin\Synchronization\CmsBlockSynchronizationDataPlugin;
use Spryker\Zed\CmsPageSearch\Communication\Plugin\Synchronization\CmsPageSynchronizationDataPlugin;
use Spryker\Zed\CmsStorage\Communication\Plugin\Synchronization\CmsSynchronizationDataPlugin;
use Spryker\Zed\CompanyUserStorage\Communication\Plugin\Synchronization\CompanyUserSynchronizationDataPlugin;
use Spryker\Zed\ContentStorage\Communication\Plugin\Synchronization\ContentStorageSynchronizationDataPlugin;
use Spryker\Zed\CustomerAccessStorage\Communication\Plugin\Synchronization\CustomerAccessSynchronizationDataBulkPlugin;
use Spryker\Zed\FileManagerStorage\Communication\Plugin\Synchronization\FileSynchronizationDataBulkPlugin;
use Spryker\Zed\GlossaryStorage\Communication\Plugin\Synchronization\GlossarySynchronizationDataPlugin;
use Spryker\Zed\NavigationStorage\Communication\Plugin\Synchronization\NavigationSynchronizationDataPlugin;
use Spryker\Zed\PriceProductMerchantRelationshipStorage\Communication\Plugin\Synchronization\PriceProductAbstractMerchantRelationSynchronizationDataBulkPlugin;
use Spryker\Zed\PriceProductMerchantRelationshipStorage\Communication\Plugin\Synchronization\PriceProductConcreteMerchantRelationSynchronizationDataBulkPlugin;
use Spryker\Zed\PriceProductStorage\Communication\Plugin\Synchronization\PriceProductAbstractSynchronizationDataPlugin;
use Spryker\Zed\PriceProductStorage\Communication\Plugin\Synchronization\PriceProductConcreteSynchronizationDataPlugin;
use Spryker\Zed\ProductAlternativeStorage\Communication\Plugin\Synchronization\ProductAlternativeSynchronizationDataPlugin;
use Spryker\Zed\ProductAlternativeStorage\Communication\Plugin\Synchronization\ProductReplacementForSynchronizationDataPlugin;
use Spryker\Zed\ProductCategoryFilterStorage\Communication\Plugin\Synchronization\ProductCategoryFilterSynchronizationDataPlugin;
use Spryker\Zed\ProductCategoryStorage\Communication\Plugin\Synchronization\ProductCategorySynchronizationDataPlugin;
use Spryker\Zed\ProductDiscontinuedStorage\Communication\Plugin\Synchronization\ProductDiscontinuedSynchronizationDataBulkPlugin;
use Spryker\Zed\ProductGroupStorage\Communication\Plugin\Synchronization\ProductGroupSynchronizationDataPlugin;
use Spryker\Zed\ProductImageStorage\Communication\Plugin\Synchronization\ProductAbstractImageSynchronizationDataPlugin;
use Spryker\Zed\ProductImageStorage\Communication\Plugin\Synchronization\ProductConcreteImageSynchronizationDataPlugin;
use Spryker\Zed\ProductLabelStorage\Communication\Plugin\Synchronization\ProductAbstractLabelSynchronizationDataPlugin;
use Spryker\Zed\ProductLabelStorage\Communication\Plugin\Synchronization\ProductLabelDictionarySynchronizationDataPlugin;
use Spryker\Zed\ProductListStorage\Communication\Plugin\Synchronization\ProductAbstractProductListSynchronizationDataBulkPlugin;
use Spryker\Zed\ProductListStorage\Communication\Plugin\Synchronization\ProductConcreteProductListSynchronizationDataBulkPlugin;
use Spryker\Zed\ProductMeasurementUnitStorage\Communication\Plugin\Synchronization\ProductConcreteMeasurementUnitSynchronizationDataBulkPlugin;
use Spryker\Zed\ProductMeasurementUnitStorage\Communication\Plugin\Synchronization\ProductMeasurementUnitSynchronizationDataBulkPlugin;
use Spryker\Zed\ProductOptionStorage\Communication\Plugin\Synchronization\ProductOptionSynchronizationDataPlugin;
use Spryker\Zed\ProductPackagingUnitStorage\Communication\Plugin\Synchronization\ProductAbstractPackagingSynchronizationDataPlugin;
use Spryker\Zed\ProductPackagingUnitStorage\Communication\Plugin\Synchronization\ProductPackagingUnitSynchronizationDataBulkPlugin;
use Spryker\Zed\ProductPageSearch\Communication\Plugin\Synchronization\ProductConcretePageSynchronizationDataPlugin;
use Spryker\Zed\ProductPageSearch\Communication\Plugin\Synchronization\ProductPageSynchronizationDataPlugin;
use Spryker\Zed\ProductQuantityStorage\Communication\Plugin\Synchronization\ProductQuantitySynchronizationDataBulkPlugin;
use Spryker\Zed\ProductRelationStorage\Communication\Plugin\Synchronization\ProductRelationSynchronizationDataPlugin;
use Spryker\Zed\ProductReviewSearch\Communication\Plugin\Synchronization\ProductReviewSynchronizationDataPlugin as ProductReviewSearchSynchronizationDataPlugin;
use Spryker\Zed\ProductReviewStorage\Communication\Plugin\Synchronization\ProductReviewSynchronizationDataPlugin;
use Spryker\Zed\ProductSearchConfigStorage\Communication\Plugin\Synchronization\ProductSearchConfigSynchronizationDataPlugin;
use Spryker\Zed\ProductSetPageSearch\Communication\Plugin\Synchronization\ProductSetSynchronizationDataPlugin as ProductSetSearchSynchronizationDataPlugin;
use Spryker\Zed\ProductSetStorage\Communication\Plugin\Synchronization\ProductSetSynchronizationDataPlugin;
use Spryker\Zed\ProductStorage\Communication\Plugin\Synchronization\ProductAbstractSynchronizationDataPlugin;
use Spryker\Zed\ProductStorage\Communication\Plugin\Synchronization\ProductConcreteSynchronizationDataPlugin;
use Spryker\Zed\ShoppingListStorage\Communication\Plugin\Synchronization\ShoppingListSynchronizationDataBulkPlugin;
use Spryker\Zed\Synchronization\SynchronizationDependencyProvider as SprykerSynchronizationDependencyProvider;
use Spryker\Zed\TaxProductStorage\Communication\Plugin\Synchronization\TaxProductSynchronizationDataPlugin;
use Spryker\Zed\TaxStorage\Communication\Plugin\Synchronization\TaxSynchronizationDataPlugin;
use Spryker\Zed\UrlStorage\Communication\Plugin\Synchronization\UrlRedirectSynchronizationDataPlugin;
use Spryker\Zed\UrlStorage\Communication\Plugin\Synchronization\UrlSynchronizationDataPlugin;

class SynchronizationDependencyProvider extends SprykerSynchronizationDependencyProvider
{
    /**
     * @return \Spryker\Zed\SynchronizationExtension\Dependency\Plugin\SynchronizationDataPluginInterface[]
     */
    protected function getSynchronizationDataPlugins(): array
    {
        return [
            new ProductAbstractPackagingSynchronizationDataPlugin(),
            new CategoryPageSynchronizationDataPlugin(),
            new CmsPageSynchronizationDataPlugin(),
            new ProductPageSynchronizationDataPlugin(),
            new ProductReviewSearchSynchronizationDataPlugin(),
            new ProductSetSearchSynchronizationDataPlugin(),
            new AvailabilitySynchronizationDataPlugin(),
            new CategoryTreeSynchronizationDataPlugin(),
            new CategoryNodeSynchronizationDataPlugin(),
            new CmsBlockCategorySynchronizationDataPlugin(),
            new CmsBlockProductSynchronizationDataPlugin(),
            new CmsBlockSynchronizationDataPlugin(),
            new CmsSynchronizationDataPlugin(),
            new FileSynchronizationDataBulkPlugin(),
            new NavigationSynchronizationDataPlugin(),
            new GlossarySynchronizationDataPlugin(),
            new PriceProductConcreteSynchronizationDataPlugin(),
            new PriceProductAbstractSynchronizationDataPlugin(),
            new ProductCategoryFilterSynchronizationDataPlugin(),
            new ProductCategorySynchronizationDataPlugin(),
            new ProductGroupSynchronizationDataPlugin(),
            new ProductAbstractImageSynchronizationDataPlugin(),
            new ProductConcreteImageSynchronizationDataPlugin(),
            new CategoryImageSynchronizationDataPlugin(),
            new ProductAbstractLabelSynchronizationDataPlugin(),
            new ProductLabelDictionarySynchronizationDataPlugin(),
            new ProductMeasurementUnitSynchronizationDataBulkPlugin(),
            new ProductConcreteMeasurementUnitSynchronizationDataBulkPlugin(),
            new ProductQuantitySynchronizationDataBulkPlugin(),
            new ProductOptionSynchronizationDataPlugin(),
            new ProductRelationSynchronizationDataPlugin(),
            new ProductReviewSynchronizationDataPlugin(),
            new ProductSearchConfigSynchronizationDataPlugin(),
            new ProductSetSynchronizationDataPlugin(),
            new ProductConcreteSynchronizationDataPlugin(),
            new ProductAbstractSynchronizationDataPlugin(),
            new UrlRedirectSynchronizationDataPlugin(),
            new UrlSynchronizationDataPlugin(),
            new ProductPackagingUnitSynchronizationDataBulkPlugin(),
            new ShoppingListSynchronizationDataBulkPlugin(),
            new ProductAbstractProductListSynchronizationDataBulkPlugin(),
            new ProductConcreteProductListSynchronizationDataBulkPlugin(),
            new PriceProductConcreteMerchantRelationSynchronizationDataBulkPlugin(),
            new PriceProductAbstractMerchantRelationSynchronizationDataBulkPlugin(),
            new ProductDiscontinuedSynchronizationDataBulkPlugin(),
            new CustomerAccessSynchronizationDataBulkPlugin(),
            new ProductConcretePageSynchronizationDataPlugin(),
            new ContentStorageSynchronizationDataPlugin(),
            new ProductAlternativeSynchronizationDataPlugin(),
            new ProductReplacementForSynchronizationDataPlugin(),
            new TaxProductSynchronizationDataPlugin(),
            new TaxSynchronizationDataPlugin(),
            new CompanyUserSynchronizationDataPlugin(),
        ];
    }
}
