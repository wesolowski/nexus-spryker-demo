<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport;

use Generated\Shared\Transfer\DataImporterQueueWriterConfigurationTransfer;
use Spryker\Zed\BusinessOnBehalfDataImport\BusinessOnBehalfDataImportConfig;
use Spryker\Zed\CategoryDataImport\CategoryDataImportConfig;
use Spryker\Zed\CmsPageDataImport\CmsPageDataImportConfig;
use Spryker\Zed\CommentDataImport\CommentDataImportConfig;
use Spryker\Zed\CompanyBusinessUnitDataImport\CompanyBusinessUnitDataImportConfig;
use Spryker\Zed\CompanyDataImport\CompanyDataImportConfig;
use Spryker\Zed\CompanyRoleDataImport\CompanyRoleDataImportConfig;
use Spryker\Zed\CompanySupplierDataImport\CompanySupplierDataImportConfig;
use Spryker\Zed\CompanyUnitAddressDataImport\CompanyUnitAddressDataImportConfig;
use Spryker\Zed\CompanyUnitAddressLabelDataImport\CompanyUnitAddressLabelDataImportConfig;
use Spryker\Zed\CompanyUserDataImport\CompanyUserDataImportConfig;
use Spryker\Zed\ContentBannerDataImport\ContentBannerDataImportConfig;
use Spryker\Zed\ContentProductDataImport\ContentProductDataImportConfig;
use Spryker\Zed\ContentProductSetDataImport\ContentProductSetDataImportConfig;
use Spryker\Zed\DataImport\DataImportConfig as SprykerDataImportConfig;
use Spryker\Zed\FileManagerDataImport\FileManagerDataImportConfig;
use Spryker\Zed\MerchantDataImport\MerchantDataImportConfig;
use Spryker\Zed\MerchantRelationshipDataImport\MerchantRelationshipDataImportConfig;
use Spryker\Zed\MerchantRelationshipProductListDataImport\MerchantRelationshipProductListDataImportConfig;
use Spryker\Zed\MerchantRelationshipSalesOrderThresholdDataImport\MerchantRelationshipSalesOrderThresholdDataImportConfig;
use Spryker\Zed\MultiCartDataImport\MultiCartDataImportConfig;
use Spryker\Zed\PriceProductDataImport\PriceProductDataImportConfig;
use Spryker\Zed\PriceProductMerchantRelationshipDataImport\PriceProductMerchantRelationshipDataImportConfig;
use Spryker\Zed\PriceProductScheduleDataImport\PriceProductScheduleDataImportConfig;
use Spryker\Zed\ProductAlternativeDataImport\ProductAlternativeDataImportConfig;
use Spryker\Zed\ProductDiscontinuedDataImport\ProductDiscontinuedDataImportConfig;
use Spryker\Zed\ProductListDataImport\ProductListDataImportConfig;
use Spryker\Zed\ProductMeasurementUnitDataImport\ProductMeasurementUnitDataImportConfig;
use Spryker\Zed\ProductPackagingUnitDataImport\ProductPackagingUnitDataImportConfig;
use Spryker\Zed\ProductQuantityDataImport\ProductQuantityDataImportConfig;
use Spryker\Zed\QuoteRequestDataImport\QuoteRequestDataImportConfig;
use Spryker\Zed\SalesOrderThresholdDataImport\SalesOrderThresholdDataImportConfig;
use Spryker\Zed\SharedCartDataImport\SharedCartDataImportConfig;
use Spryker\Zed\ShoppingListDataImport\ShoppingListDataImportConfig;

/**
 * @SuppressWarnings(PHPMD.ExcessiveClassComplexity)
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class DataImportConfig extends SprykerDataImportConfig
{
    public const IMPORT_TYPE_CATEGORY_TEMPLATE = 'category-template';
    public const IMPORT_TYPE_CUSTOMER = 'customer';
    public const IMPORT_TYPE_GLOSSARY = 'glossary';
    public const IMPORT_TYPE_NAVIGATION = 'navigation';
    public const IMPORT_TYPE_NAVIGATION_NODE = 'navigation-node';
    public const IMPORT_TYPE_PRODUCT_PRICE = 'product-price';
    public const IMPORT_TYPE_PRODUCT_STOCK = 'product-stock';
    public const IMPORT_TYPE_PRODUCT_ABSTRACT = 'product-abstract';
    public const IMPORT_TYPE_PRODUCT_ABSTRACT_STORE = 'product-abstract-store';
    public const IMPORT_TYPE_PRODUCT_CONCRETE = 'product-concrete';
    public const IMPORT_TYPE_PRODUCT_ATTRIBUTE_KEY = 'product-attribute-key';
    public const IMPORT_TYPE_PRODUCT_MANAGEMENT_ATTRIBUTE = 'product-management-attribute';
    public const IMPORT_TYPE_PRODUCT_RELATION = 'product-relation';
    public const IMPORT_TYPE_PRODUCT_REVIEW = 'product-review';
    public const IMPORT_TYPE_PRODUCT_LABEL = 'product-label';
    public const IMPORT_TYPE_PRODUCT_SET = 'product-set';
    public const IMPORT_TYPE_PRODUCT_GROUP = 'product-group';
    public const IMPORT_TYPE_PRODUCT_OPTION = 'product-option';
    public const IMPORT_TYPE_PRODUCT_OPTION_PRICE = 'product-option-price';
    public const IMPORT_TYPE_PRODUCT_IMAGE = 'product-image';
    public const IMPORT_TYPE_PRODUCT_SEARCH_ATTRIBUTE_MAP = 'product-search-attribute-map';
    public const IMPORT_TYPE_PRODUCT_SEARCH_ATTRIBUTE = 'product-search-attribute';
    public const IMPORT_TYPE_CMS_TEMPLATE = 'cms-template';
    public const IMPORT_TYPE_CMS_BLOCK = 'cms-block';
    public const IMPORT_TYPE_CMS_BLOCK_STORE = 'cms-block-store';
    public const IMPORT_TYPE_CMS_BLOCK_CATEGORY_POSITION = 'cms-block-category-position';
    public const IMPORT_TYPE_CMS_BLOCK_CATEGORY = 'cms-block-category';
    public const IMPORT_TYPE_DISCOUNT = 'discount';
    public const IMPORT_TYPE_DISCOUNT_STORE = 'discount-store';
    public const IMPORT_TYPE_DISCOUNT_AMOUNT = 'discount-amount';
    public const IMPORT_TYPE_DISCOUNT_VOUCHER = 'discount-voucher';
    public const IMPORT_TYPE_SHIPMENT = 'shipment';
    public const IMPORT_TYPE_SHIPMENT_PRICE = 'shipment-price';
    public const IMPORT_TYPE_STOCK = 'stock';
    public const IMPORT_TYPE_TAX = 'tax';
    public const IMPORT_TYPE_CURRENCY = 'currency';
    public const IMPORT_TYPE_STORE = 'store';
    public const IMPORT_TYPE_ORDER_SOURCE = 'order-source';
    public const IMPORT_TYPE_ABSTRACT_GIFT_CARD_CONFIGURATION = 'gift-card-abstract-configuration';
    public const IMPORT_TYPE_CONCRETE_GIFT_CARD_CONFIGURATION = 'gift-card-concrete-configuration';

    public const PRODUCT_ABSTRACT_QUEUE = 'import.product_abstract';
    public const PRODUCT_ABSTRACT_QUEUE_ERROR = 'import.product_abstract.error';
    public const PRODUCT_CONCRETE_QUEUE = 'import.product_concrete';
    public const PRODUCT_CONCRETE_QUEUE_ERROR = 'import.product_concrete.error';
    public const PRODUCT_IMAGE_QUEUE = 'import.product_image';
    public const PRODUCT_IMAGE_QUEUE_ERROR = 'import.product_image.error';
    public const PRODUCT_PRICE_QUEUE = 'import.product_price';
    public const PRODUCT_PRICE_QUEUE_ERROR = 'import.product_price.error';

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getCurrencyDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('currency.csv', static::IMPORT_TYPE_CURRENCY);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getOrderSourceDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('order_source.csv', static::IMPORT_TYPE_ORDER_SOURCE);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getStoreDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('', static::IMPORT_TYPE_STORE);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getGlossaryDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('glossary.csv', static::IMPORT_TYPE_GLOSSARY);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getCustomerDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('customer.csv', static::IMPORT_TYPE_CUSTOMER);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getCategoryTemplateDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('category_template.csv', static::IMPORT_TYPE_CATEGORY_TEMPLATE);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getTaxDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('tax.csv', static::IMPORT_TYPE_TAX);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getProductPriceDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('product_price.csv', static::IMPORT_TYPE_PRODUCT_PRICE);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getProductStockDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('product_stock.csv', static::IMPORT_TYPE_PRODUCT_STOCK);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getStockDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('stock.csv', static::IMPORT_TYPE_STOCK);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getShipmentDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('shipment.csv', static::IMPORT_TYPE_SHIPMENT);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getShipmentPriceDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('shipment_price.csv', static::IMPORT_TYPE_SHIPMENT_PRICE);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getNavigationDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('navigation.csv', static::IMPORT_TYPE_NAVIGATION);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getNavigationNodeDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('navigation_node.csv', static::IMPORT_TYPE_NAVIGATION_NODE);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getProductAbstractDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('icecat_biz_data' . DIRECTORY_SEPARATOR . 'product_abstract.csv', static::IMPORT_TYPE_PRODUCT_ABSTRACT);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getProductAbstractStoreDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('icecat_biz_data' . DIRECTORY_SEPARATOR . 'product_abstract_store.csv', static::IMPORT_TYPE_PRODUCT_ABSTRACT_STORE);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getProductConcreteDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('icecat_biz_data' . DIRECTORY_SEPARATOR . 'product_concrete.csv', static::IMPORT_TYPE_PRODUCT_CONCRETE);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getProductAttributeKeyDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('product_attribute_key.csv', static::IMPORT_TYPE_PRODUCT_ATTRIBUTE_KEY);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getProductManagementAttributeDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('product_management_attribute.csv', static::IMPORT_TYPE_PRODUCT_MANAGEMENT_ATTRIBUTE);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getProductRelationDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('product_relation.csv', static::IMPORT_TYPE_PRODUCT_RELATION);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getProductReviewDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('product_review.csv', static::IMPORT_TYPE_PRODUCT_REVIEW);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getProductLabelDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('product_label.csv', static::IMPORT_TYPE_PRODUCT_LABEL);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getProductSetDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('icecat_biz_data' . DIRECTORY_SEPARATOR . 'product_set.csv', static::IMPORT_TYPE_PRODUCT_SET);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getProductSearchAttributeMapDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('product_search_attribute_map.csv', static::IMPORT_TYPE_PRODUCT_SEARCH_ATTRIBUTE_MAP);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getProductSearchAttributeDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('product_search_attribute.csv', static::IMPORT_TYPE_PRODUCT_SEARCH_ATTRIBUTE);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getProductGroupDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('product_group.csv', static::IMPORT_TYPE_PRODUCT_GROUP);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getProductOptionDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('product_option.csv', static::IMPORT_TYPE_PRODUCT_OPTION);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getProductOptionPriceDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('product_option_price.csv', static::IMPORT_TYPE_PRODUCT_OPTION_PRICE);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getProductImageDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('icecat_biz_data' . DIRECTORY_SEPARATOR . 'product_image.csv', static::IMPORT_TYPE_PRODUCT_IMAGE);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getCmsTemplateDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('cms_template.csv', static::IMPORT_TYPE_CMS_TEMPLATE);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getCmsBlockDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('cms_block.csv', static::IMPORT_TYPE_CMS_BLOCK);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getCmsBlockStoreDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('cms_block_store.csv', static::IMPORT_TYPE_CMS_BLOCK_STORE);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getCmsBlockCategoryPositionDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('cms_block_category_position.csv', static::IMPORT_TYPE_CMS_BLOCK_CATEGORY_POSITION);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getCmsBlockCategoryDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('cms_block_category.csv', static::IMPORT_TYPE_CMS_BLOCK_CATEGORY);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getDiscountDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('discount.csv', static::IMPORT_TYPE_DISCOUNT);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getDiscountStoreDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('discount_store.csv', static::IMPORT_TYPE_DISCOUNT_STORE);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getDiscountAmountDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('discount_amount.csv', static::IMPORT_TYPE_DISCOUNT_AMOUNT);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getDiscountVoucherDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('discount_voucher.csv', static::IMPORT_TYPE_DISCOUNT_VOUCHER);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterQueueWriterConfigurationTransfer
     */
    public function getProductAbstractQueueWriterConfiguration(): DataImporterQueueWriterConfigurationTransfer
    {
        return (new DataImporterQueueWriterConfigurationTransfer())
            ->setQueueName(static::PRODUCT_ABSTRACT_QUEUE)
            ->setChunkSize($this->getQueueWriterChunkSize());
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterQueueWriterConfigurationTransfer
     */
    public function getProductConcreteQueueWriterConfiguration(): DataImporterQueueWriterConfigurationTransfer
    {
        return (new DataImporterQueueWriterConfigurationTransfer())
            ->setQueueName(static::PRODUCT_CONCRETE_QUEUE)
            ->setChunkSize($this->getQueueWriterChunkSize());
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterQueueWriterConfigurationTransfer
     */
    public function getProductImageQueueWriterConfiguration(): DataImporterQueueWriterConfigurationTransfer
    {
        return (new DataImporterQueueWriterConfigurationTransfer())
            ->setQueueName(static::PRODUCT_IMAGE_QUEUE)
            ->setChunkSize($this->getQueueWriterChunkSize());
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterQueueWriterConfigurationTransfer
     */
    public function getProductPriceQueueWriterConfiguration(): DataImporterQueueWriterConfigurationTransfer
    {
        return (new DataImporterQueueWriterConfigurationTransfer())
            ->setQueueName(static::PRODUCT_PRICE_QUEUE)
            ->setChunkSize($this->getQueueWriterChunkSize());
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getAbstractGiftCardProductConfigurationDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('gift_card_abstract_configuration.csv', static::IMPORT_TYPE_ABSTRACT_GIFT_CARD_CONFIGURATION);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getConcreteGiftCardProductConfigurationDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('gift_card_concrete_configuration.csv', static::IMPORT_TYPE_CONCRETE_GIFT_CARD_CONFIGURATION);
    }

    /**
     * @return string[]
     */
    public function getFullImportTypes(): array
    {
        return [
            static::IMPORT_TYPE_CATEGORY_TEMPLATE,
            static::IMPORT_TYPE_CUSTOMER,
            static::IMPORT_TYPE_GLOSSARY,
            static::IMPORT_TYPE_NAVIGATION,
            static::IMPORT_TYPE_NAVIGATION_NODE,
            static::IMPORT_TYPE_PRODUCT_PRICE,
            static::IMPORT_TYPE_PRODUCT_STOCK,
            static::IMPORT_TYPE_PRODUCT_ABSTRACT,
            static::IMPORT_TYPE_PRODUCT_ABSTRACT_STORE,
            static::IMPORT_TYPE_PRODUCT_CONCRETE,
            static::IMPORT_TYPE_PRODUCT_ATTRIBUTE_KEY,
            static::IMPORT_TYPE_PRODUCT_MANAGEMENT_ATTRIBUTE,
            static::IMPORT_TYPE_PRODUCT_RELATION,
            static::IMPORT_TYPE_PRODUCT_REVIEW,
            static::IMPORT_TYPE_PRODUCT_LABEL,
            static::IMPORT_TYPE_PRODUCT_SET,
            static::IMPORT_TYPE_PRODUCT_GROUP,
            static::IMPORT_TYPE_PRODUCT_OPTION,
            static::IMPORT_TYPE_PRODUCT_OPTION_PRICE,
            static::IMPORT_TYPE_PRODUCT_IMAGE,
            static::IMPORT_TYPE_PRODUCT_SEARCH_ATTRIBUTE_MAP,
            static::IMPORT_TYPE_PRODUCT_SEARCH_ATTRIBUTE,
            static::IMPORT_TYPE_CMS_TEMPLATE,
            static::IMPORT_TYPE_CMS_BLOCK,
            static::IMPORT_TYPE_CMS_BLOCK_STORE,
            static::IMPORT_TYPE_CMS_BLOCK_CATEGORY_POSITION,
            static::IMPORT_TYPE_CMS_BLOCK_CATEGORY,
            static::IMPORT_TYPE_DISCOUNT,
            static::IMPORT_TYPE_DISCOUNT_STORE,
            static::IMPORT_TYPE_DISCOUNT_AMOUNT,
            static::IMPORT_TYPE_DISCOUNT_VOUCHER,
            static::IMPORT_TYPE_SHIPMENT,
            static::IMPORT_TYPE_SHIPMENT_PRICE,
            static::IMPORT_TYPE_STOCK,
            static::IMPORT_TYPE_TAX,
            static::IMPORT_TYPE_CURRENCY,
            static::IMPORT_TYPE_STORE,
            static::IMPORT_TYPE_ORDER_SOURCE,
            static::IMPORT_TYPE_ABSTRACT_GIFT_CARD_CONFIGURATION,
            static::IMPORT_TYPE_CONCRETE_GIFT_CARD_CONFIGURATION,
            CmsPageDataImportConfig::IMPORT_TYPE_CMS_PAGE_STORE,
            CmsPageDataImportConfig::IMPORT_TYPE_CMS_PAGE,
            CompanyDataImportConfig::IMPORT_TYPE_COMPANY,
            CategoryDataImportConfig::IMPORT_TYPE_CATEGORY,
            MerchantDataImportConfig::IMPORT_TYPE_MERCHANT,
            MultiCartDataImportConfig::IMPORT_TYPE_MULTI_CART,
            SharedCartDataImportConfig::IMPORT_TYPE_SHARED_CART,
            CompanyRoleDataImportConfig::IMPORT_TYPE_COMPANY_USER_ROLE,
            CompanyRoleDataImportConfig::IMPORT_TYPE_COMPANY_ROLE_PERMISSION,
            CompanyRoleDataImportConfig::IMPORT_TYPE_COMPANY_ROLE,
            CompanyUserDataImportConfig::IMPORT_TYPE_COMPANY_USER,
            FileManagerDataImportConfig::IMPORT_TYPE_MIME_TYPE,
            ProductListDataImportConfig::IMPORT_TYPE_PRODUCT_LIST_CATEGORY,
            ProductListDataImportConfig::IMPORT_TYPE_PRODUCT_LIST_PRODUCT_CONCRETE,
            ProductListDataImportConfig::IMPORT_TYPE_PRODUCT_LIST,
            PriceProductDataImportConfig::IMPORT_TYPE_PRODUCT_PRICE,
            QuoteRequestDataImportConfig::IMPORT_TYPE_QUOTE_REQUEST,
            QuoteRequestDataImportConfig::IMPORT_TYPE_QUOTE_REQUEST_VERSION,
            ShoppingListDataImportConfig::IMPORT_TYPE_SHOPPING_LIST_COMPANY_USER,
            ShoppingListDataImportConfig::IMPORT_TYPE_SHOPPING_LIST_ITEM,
            ShoppingListDataImportConfig::IMPORT_TYPE_SHOPPING_LIST,
            ShoppingListDataImportConfig::IMPORT_TYPE_SHOPPING_LIST_COMPANY_BUSINESS_UNIT,
            ContentBannerDataImportConfig::IMPORT_TYPE_CONTENT_BANNER,
            ContentProductDataImportConfig::IMPORT_TYPE_CONTENT_PRODUCT,
            CompanySupplierDataImportConfig::IMPORT_TYPE_COMPANY_SUPPLIER,
            CompanySupplierDataImportConfig::IMPORT_TYPE_PRODUCT_PRICE,
            CompanySupplierDataImportConfig::IMPORT_TYPE_COMPANY_TYPE,
            ProductQuantityDataImportConfig::IMPORT_TYPE_PRODUCT_QUANTITY,
            BusinessOnBehalfDataImportConfig::IMPORT_TYPE_COMPANY_USER,
            ContentProductSetDataImportConfig::IMPORT_TYPE_CONTENT_PRODUCT_SET,
            CompanyUnitAddressDataImportConfig::IMPORT_TYPE_COMPANY_UNIT_ADDRESS,
            ProductAlternativeDataImportConfig::IMPORT_TYPE_PRODUCT_ALTERNATIVE,
            CompanyBusinessUnitDataImportConfig::IMPORT_TYPE_COMPANY_BUSINESS_UNIT_USER,
            CompanyBusinessUnitDataImportConfig::IMPORT_TYPE_COMPANY_BUSINESS_UNIT_ADDRESS,
            CompanyBusinessUnitDataImportConfig::IMPORT_TYPE_COMPANY_BUSINESS_UNIT,
            ProductDiscontinuedDataImportConfig::IMPORT_TYPE_PRODUCT_DISCONTINUED,
            SalesOrderThresholdDataImportConfig::IMPORT_TYPE_SALES_ORDER_THRESHOLD,
            MerchantRelationshipDataImportConfig::IMPORT_TYPE_MERCHANT_RELATIONSHIP,
            PriceProductScheduleDataImportConfig::IMPORT_TYPE_PRODUCT_PRICE_SCHEDULE,
            ProductPackagingUnitDataImportConfig::IMPORT_TYPE_PRODUCT_PACKAGING_UNIT_TYPE,
            ProductPackagingUnitDataImportConfig::IMPORT_TYPE_PRODUCT_PACKAGING_UNIT,
            ProductMeasurementUnitDataImportConfig::IMPORT_TYPE_PRODUCT_MEASUREMENT_SALES_UNIT_STORE,
            ProductMeasurementUnitDataImportConfig::IMPORT_TYPE_PRODUCT_MEASUREMENT_SALES_UNIT,
            ProductMeasurementUnitDataImportConfig::IMPORT_TYPE_PRODUCT_MEASUREMENT_UNIT,
            ProductMeasurementUnitDataImportConfig::IMPORT_TYPE_PRODUCT_MEASUREMENT_BASE_UNIT,
            CompanyUnitAddressLabelDataImportConfig::IMPORT_TYPE_COMPANY_UNIT_ADDRESS_LABEL,
            CompanyUnitAddressLabelDataImportConfig::IMPORT_TYPE_COMPANY_UNIT_ADDRESS_LABEL_RELATION,
            MerchantRelationshipProductListDataImportConfig::IMPORT_TYPE_MERCHANT_RELATIONSHIP_PRODUCT_LIST,
            PriceProductMerchantRelationshipDataImportConfig::IMPORT_TYPE_PRICE_PRODUCT_MERCHANT_RELATIONSHIP,
            MerchantRelationshipSalesOrderThresholdDataImportConfig::IMPORT_TYPE_MERCHANT_RELATIONSHIP_SALES_ORDER_THRESHOLD,
            CommentDataImportConfig::IMPORT_TYPE_COMMENT,
        ];
    }
}
