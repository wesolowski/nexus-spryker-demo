<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport;

use Spryker\Zed\BusinessOnBehalfDataImport\Communication\Plugin\DataImport\BusinessOnBehalfCompanyUserDataImportPlugin;
use Spryker\Zed\CategoryDataImport\Communication\Plugin\CategoryDataImportPlugin;
use Spryker\Zed\CmsPageDataImport\Communication\Plugin\CmsPageDataImportPlugin;
use Spryker\Zed\CmsPageDataImport\Communication\Plugin\CmsPageStoreDataImportPlugin;
use Spryker\Zed\CommentDataImport\Communication\Plugin\CommentDataImportPlugin;
use Spryker\Zed\CompanyBusinessUnitDataImport\Communication\Plugin\CompanyBusinessUnitAddressDataImportPlugin;
use Spryker\Zed\CompanyBusinessUnitDataImport\Communication\Plugin\CompanyBusinessUnitDataImportPlugin;
use Spryker\Zed\CompanyBusinessUnitDataImport\Communication\Plugin\CompanyBusinessUnitUserDataImportPlugin;
use Spryker\Zed\CompanyDataImport\Communication\Plugin\CompanyDataImportPlugin;
use Spryker\Zed\CompanyRoleDataImport\Communication\Plugin\DataImport\CompanyRoleDataImportPlugin;
use Spryker\Zed\CompanyRoleDataImport\Communication\Plugin\DataImport\CompanyRolePermissionDataImportPlugin;
use Spryker\Zed\CompanyRoleDataImport\Communication\Plugin\DataImport\CompanyUserRoleDataImportPlugin;
use Spryker\Zed\CompanyUnitAddressDataImport\Communication\Plugin\CompanyUnitAddressDataImportPlugin;
use Spryker\Zed\CompanyUnitAddressLabelDataImport\Communication\Plugin\CompanyUnitAddressLabelDataImportPlugin;
use Spryker\Zed\CompanyUnitAddressLabelDataImport\Communication\Plugin\CompanyUnitAddressLabelRelationDataImportPlugin;
use Spryker\Zed\CompanyUserDataImport\Communication\Plugin\DataImport\CompanyUserDataImportPlugin;
use Spryker\Zed\ContentBannerDataImport\Communication\Plugin\ContentBannerDataImportPlugin;
use Spryker\Zed\ContentProductDataImport\Communication\Plugin\ContentProductAbstractListDataImportPlugin;
use Spryker\Zed\ContentProductSetDataImport\Communication\Plugin\ContentProductSetDataImportPlugin;
use Spryker\Zed\DataImport\Communication\Plugin\DataImportEventBehaviorPlugin;
use Spryker\Zed\DataImport\Communication\Plugin\DataImportPublisherPlugin;
use Spryker\Zed\DataImport\DataImportDependencyProvider as SprykerDataImportDependencyProvider;
use Spryker\Zed\FileManagerDataImport\Communication\Plugin\FileManagerDataImportPlugin;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\MerchantDataImport\Communication\Plugin\MerchantDataImportPlugin;
use Spryker\Zed\MerchantRelationshipDataImport\Communication\Plugin\MerchantRelationshipDataImportPlugin;
use Spryker\Zed\MerchantRelationshipProductListDataImport\Communication\Plugin\MerchantRelationshipProductListDataImportPlugin;
use Spryker\Zed\MerchantRelationshipSalesOrderThresholdDataImport\Communication\Plugin\DataImport\MerchantRelationshipSalesOrderThresholdDataImportPlugin;
use Spryker\Zed\MultiCartDataImport\Communication\Plugin\MultiCartDataImportPlugin;
use Spryker\Zed\PriceProductMerchantRelationshipDataImport\Communication\Plugin\PriceProductMerchantRelationshipDataImportPlugin;
use Spryker\Zed\PriceProductScheduleDataImport\Communication\Plugin\PriceProductScheduleDataImportPlugin;
use Spryker\Zed\ProductAlternativeDataImport\Communication\Plugin\ProductAlternativeDataImportPlugin;
use Spryker\Zed\ProductDiscontinuedDataImport\Communication\Plugin\ProductDiscontinuedDataImportPlugin;
use Spryker\Zed\ProductListDataImport\Communication\Plugin\ProductListCategoryDataImportPlugin;
use Spryker\Zed\ProductListDataImport\Communication\Plugin\ProductListDataImportPlugin;
use Spryker\Zed\ProductListDataImport\Communication\Plugin\ProductListProductConcreteDataImportPlugin;
use Spryker\Zed\ProductMeasurementUnitDataImport\Communication\Plugin\ProductMeasurementBaseUnitDataImportPlugin;
use Spryker\Zed\ProductMeasurementUnitDataImport\Communication\Plugin\ProductMeasurementSalesUnitDataImportPlugin;
use Spryker\Zed\ProductMeasurementUnitDataImport\Communication\Plugin\ProductMeasurementSalesUnitStoreDataImportPlugin;
use Spryker\Zed\ProductMeasurementUnitDataImport\Communication\Plugin\ProductMeasurementUnitDataImportPlugin;
use Spryker\Zed\ProductPackagingUnitDataImport\Communication\Plugin\DataImport\ProductPackagingUnitDataImportPlugin;
use Spryker\Zed\ProductPackagingUnitDataImport\Communication\Plugin\DataImport\ProductPackagingUnitTypeDataImportPlugin;
use Spryker\Zed\ProductQuantityDataImport\Communication\Plugin\ProductQuantityDataImportPlugin;
use Spryker\Zed\QuoteRequestDataImport\Communication\Plugin\QuoteRequestDataImportPlugin;
use Spryker\Zed\QuoteRequestDataImport\Communication\Plugin\QuoteRequestVersionDataImportPlugin;
use Spryker\Zed\SalesOrderThresholdDataImport\Communication\Plugin\DataImport\SalesOrderThresholdDataImportPlugin;
use Spryker\Zed\SharedCartDataImport\Communication\Plugin\SharedCartDataImportPlugin;
use Spryker\Zed\ShoppingListDataImport\Communication\Plugin\ShoppingListCompanyBusinessUnitDataImportPlugin;
use Spryker\Zed\ShoppingListDataImport\Communication\Plugin\ShoppingListCompanyUserDataImportPlugin;
use Spryker\Zed\ShoppingListDataImport\Communication\Plugin\ShoppingListDataImportPlugin;
use Spryker\Zed\ShoppingListDataImport\Communication\Plugin\ShoppingListItemDataImportPlugin;

class DataImportDependencyProvider extends SprykerDataImportDependencyProvider
{
    public const FACADE_CATEGORY = 'category facade';
    public const FACADE_STORE = 'store facade';
    public const FACADE_CURRENCY = 'currency facade';
    public const FACADE_PRODUCT_BUNDLE = 'product bundle facade';
    public const FACADE_PRODUCT_RELATION = 'product relation facade';
    public const FACADE_STOCK = 'stock facade';
    public const FACADE_PRODUCT_SEARCH = 'product search facade';

    public const FACADE_PRICE_PRODUCT = 'FACADE_PRICE_PRODUCT';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container = $this->addStockFacade($container);
        $container = $this->addCurrencyFacade($container);
        $container = $this->addStoreFacade($container);
        $container = $this->addCategoryFacade($container);
        $container = $this->addProductBundleFacade($container);
        $container = $this->addProductRelationFacade($container);
        $container = $this->addProductSearchFacade($container);
        $container = $this->addPriceProductFacade($container);
        $container = $this->addUtilEncodingService($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addCurrencyFacade(Container $container)
    {
        $container[static::FACADE_CURRENCY] = function (Container $container) {
            return $container->getLocator()->currency()->facade();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addStoreFacade(Container $container)
    {
        $container[static::FACADE_STORE] = function (Container $container) {
            return $container->getLocator()->store()->facade();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addStockFacade(Container $container)
    {
        $container[static::FACADE_STOCK] = function (Container $container) {
            return $container->getLocator()->stock()->facade();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addCategoryFacade(Container $container)
    {
        $container[static::FACADE_CATEGORY] = function (Container $container) {
            return $container->getLocator()->category()->facade();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addProductBundleFacade(Container $container)
    {
        $container[static::FACADE_PRODUCT_BUNDLE] = function (Container $container) {
            return $container->getLocator()->productBundle()->facade();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addProductSearchFacade(Container $container)
    {
        $container[static::FACADE_PRODUCT_SEARCH] = function (Container $container) {
            return $container->getLocator()->productSearch()->facade();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addProductRelationFacade(Container $container)
    {
        $container[static::FACADE_PRODUCT_RELATION] = function (Container $container) {
            return $container->getLocator()->productRelation()->facade();
        };

        return $container;
    }

    /**
     * @return array
     */
    protected function getDataImporterPlugins(): array
    {
        return [
            [new CategoryDataImportPlugin(), DataImportConfig::IMPORT_TYPE_CATEGORY_TEMPLATE],
            new CmsPageDataImportPlugin(),
            new CmsPageStoreDataImportPlugin(),
            new CompanyDataImportPlugin(),
            new CompanyBusinessUnitDataImportPlugin(),
            new CompanyUnitAddressDataImportPlugin(),
            new CompanyUnitAddressLabelDataImportPlugin(),
            new CompanyUnitAddressLabelRelationDataImportPlugin(),
            new ProductDiscontinuedDataImportPlugin(), #ProductDiscontinuedFeature
            new ProductMeasurementUnitDataImportPlugin(),
            new ProductMeasurementBaseUnitDataImportPlugin(),
            new ProductMeasurementSalesUnitDataImportPlugin(),
            new ProductMeasurementSalesUnitStoreDataImportPlugin(),
            new ProductQuantityDataImportPlugin(),
            new ProductAlternativeDataImportPlugin(), #ProductAlternativeFeature
            new ProductPackagingUnitTypeDataImportPlugin(),
            new ProductPackagingUnitDataImportPlugin(),
            new BusinessOnBehalfCompanyUserDataImportPlugin(),
            new SalesOrderThresholdDataImportPlugin(),
            new MerchantDataImportPlugin(),
            new MerchantRelationshipDataImportPlugin(),
            new MerchantRelationshipSalesOrderThresholdDataImportPlugin(),
            new ProductListDataImportPlugin(),
            new ProductListCategoryDataImportPlugin(),
            new ProductListProductConcreteDataImportPlugin(),
            new MerchantRelationshipProductListDataImportPlugin(),
            new PriceProductMerchantRelationshipDataImportPlugin(),
            new FileManagerDataImportPlugin(),
            new CompanyUserDataImportPlugin(),
            new CompanyRoleDataImportPlugin(),
            new CompanyRolePermissionDataImportPlugin(),
            new CompanyUserRoleDataImportPlugin(),
            new CompanyBusinessUnitUserDataImportPlugin(),
            new CompanyBusinessUnitAddressDataImportPlugin(),
            new MultiCartDataImportPlugin(),
            new SharedCartDataImportPlugin(),
            new ShoppingListDataImportPlugin(),
            new ShoppingListItemDataImportPlugin(),
            new ShoppingListCompanyUserDataImportPlugin(),
            new ShoppingListCompanyBusinessUnitDataImportPlugin(),
            new QuoteRequestDataImportPlugin(),
            new QuoteRequestVersionDataImportPlugin(),
            new PriceProductScheduleDataImportPlugin(),
            new ContentBannerDataImportPlugin(),
            new ContentProductAbstractListDataImportPlugin(),
            new ContentProductSetDataImportPlugin(),
            new CommentDataImportPlugin(),
        ];
    }

    /**
     * @return array
     */
    protected function getDataImportBeforeImportHookPlugins(): array
    {
        return [
            new DataImportEventBehaviorPlugin(),
        ];
    }

    /**
     * @return array
     */
    protected function getDataImportAfterImportHookPlugins(): array
    {
        return [
            new DataImportEventBehaviorPlugin(),
            new DataImportPublisherPlugin(),
        ];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addPriceProductFacade(Container $container): Container
    {
        $container[static::FACADE_PRICE_PRODUCT] = function (Container $container) {
            return $container->getLocator()->priceProduct()->facade();
        };

        return $container;
    }
}
