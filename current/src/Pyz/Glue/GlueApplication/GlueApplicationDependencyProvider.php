<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Glue\GlueApplication;

use Spryker\Glue\AlternativeProductsRestApi\Plugin\GlueApplication\AbstractAlternativeProductsResourceRoutePlugin;
use Spryker\Glue\AlternativeProductsRestApi\Plugin\GlueApplication\ConcreteAlternativeProductsResourceRoutePlugin;
use Spryker\Glue\AuthRestApi\Plugin\AccessTokenRestRequestValidatorPlugin;
use Spryker\Glue\AuthRestApi\Plugin\AccessTokensResourceRoutePlugin;
use Spryker\Glue\AuthRestApi\Plugin\FormatAuthenticationErrorResponseHeadersPlugin;
use Spryker\Glue\AuthRestApi\Plugin\RefreshTokensResourceRoutePlugin;
use Spryker\Glue\AuthRestApi\Plugin\RestUserFinderByAccessTokenPlugin;
use Spryker\Glue\CartPermissionGroupsRestApi\Plugin\GlueApplication\CartPermissionGroupByQuoteResourceRelationshipPlugin;
use Spryker\Glue\CartPermissionGroupsRestApi\Plugin\GlueApplication\CartPermissionGroupByShareDetailResourceRelationshipPlugin;
use Spryker\Glue\CartPermissionGroupsRestApi\Plugin\GlueApplication\CartPermissionGroupsResourceRoutePlugin;
use Spryker\Glue\CartsRestApi\CartsRestApiConfig;
use Spryker\Glue\CartsRestApi\Plugin\ControllerBeforeAction\SetAnonymousCustomerIdControllerBeforeActionPlugin;
use Spryker\Glue\CartsRestApi\Plugin\ResourceRoute\CartItemsResourceRoutePlugin;
use Spryker\Glue\CartsRestApi\Plugin\ResourceRoute\CartsResourceRoutePlugin;
use Spryker\Glue\CartsRestApi\Plugin\ResourceRoute\GuestCartItemsResourceRoutePlugin;
use Spryker\Glue\CartsRestApi\Plugin\ResourceRoute\GuestCartsResourceRoutePlugin;
use Spryker\Glue\CartsRestApi\Plugin\Validator\AnonymousCustomerUniqueIdValidatorPlugin;
use Spryker\Glue\CatalogSearchProductsResourceRelationship\Plugin\CatalogSearchAbstractProductsResourceRelationshipPlugin;
use Spryker\Glue\CatalogSearchProductsResourceRelationship\Plugin\CatalogSearchSuggestionsAbstractProductsResourceRelationshipPlugin;
use Spryker\Glue\CatalogSearchRestApi\CatalogSearchRestApiConfig;
use Spryker\Glue\CatalogSearchRestApi\Plugin\CatalogSearchResourceRoutePlugin;
use Spryker\Glue\CatalogSearchRestApi\Plugin\CatalogSearchSuggestionsResourceRoutePlugin;
use Spryker\Glue\CategoriesRestApi\Plugin\CategoriesResourceRoutePlugin;
use Spryker\Glue\CategoriesRestApi\Plugin\CategoryResourceRoutePlugin;
use Spryker\Glue\CheckoutRestApi\CheckoutRestApiConfig;
use Spryker\Glue\CheckoutRestApi\Plugin\GlueApplication\CheckoutDataResourcePlugin;
use Spryker\Glue\CheckoutRestApi\Plugin\GlueApplication\CheckoutResourcePlugin;
use Spryker\Glue\CompaniesRestApi\Plugin\GlueApplication\CompaniesResourcePlugin;
use Spryker\Glue\CompaniesRestApi\Plugin\GlueApplication\CompanyByCompanyBusinessUnitResourceRelationshipPlugin;
use Spryker\Glue\CompaniesRestApi\Plugin\GlueApplication\CompanyByCompanyRoleResourceRelationshipPlugin;
use Spryker\Glue\CompaniesRestApi\Plugin\GlueApplication\CompanyByCompanyUserResourceRelationshipPlugin;
use Spryker\Glue\CompanyBusinessUnitAddressesRestApi\Plugin\GlueApplication\CompanyBusinessUnitAddressesByCompanyBusinessUnitResourceRelationshipPlugin;
use Spryker\Glue\CompanyBusinessUnitAddressesRestApi\Plugin\GlueApplication\CompanyBusinessUnitAddressesResourcePlugin;
use Spryker\Glue\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiConfig;
use Spryker\Glue\CompanyBusinessUnitsRestApi\Plugin\GlueApplication\CompanyBusinessUnitByCompanyUserResourceRelationshipPlugin;
use Spryker\Glue\CompanyBusinessUnitsRestApi\Plugin\GlueApplication\CompanyBusinessUnitsResourcePlugin;
use Spryker\Glue\CompanyRolesRestApi\CompanyRolesRestApiConfig;
use Spryker\Glue\CompanyRolesRestApi\Plugin\GlueApplication\CompanyRoleByCompanyUserResourceRelationshipPlugin;
use Spryker\Glue\CompanyRolesRestApi\Plugin\GlueApplication\CompanyRolesResourcePlugin;
use Spryker\Glue\CompanyUserAuthRestApi\Plugin\GlueApplication\CompanyUserAccessTokensResourceRoutePlugin;
use Spryker\Glue\CompanyUsersRestApi\CompanyUsersRestApiConfig;
use Spryker\Glue\CompanyUsersRestApi\Plugin\GlueApplication\CompanyUserByShareDetailResourceRelationshipPlugin;
use Spryker\Glue\CompanyUsersRestApi\Plugin\GlueApplication\CompanyUsersResourceRoutePlugin;
use Spryker\Glue\ContentBannersRestApi\Plugin\ContentBannerResourceRoutePlugin;
use Spryker\Glue\ContentProductAbstractListsRestApi\Plugin\ContentProductAbstractListRoutePlugin;
use Spryker\Glue\CustomersRestApi\CustomersRestApiConfig;
use Spryker\Glue\CustomersRestApi\Plugin\AddressesResourceRoutePlugin;
use Spryker\Glue\CustomersRestApi\Plugin\CustomerForgottenPasswordResourceRoutePlugin;
use Spryker\Glue\CustomersRestApi\Plugin\CustomerPasswordResourceRoutePlugin;
use Spryker\Glue\CustomersRestApi\Plugin\CustomerRestorePasswordResourceRoutePlugin;
use Spryker\Glue\CustomersRestApi\Plugin\CustomersResourceRoutePlugin;
use Spryker\Glue\CustomersRestApi\Plugin\CustomersToAddressesRelationshipPlugin;
use Spryker\Glue\CustomersRestApi\Plugin\GlueApplication\CustomerByCompanyUserResourceRelationshipPlugin;
use Spryker\Glue\CustomersRestApi\Plugin\SetCustomerBeforeActionPlugin;
use Spryker\Glue\EntityTagsRestApi\Plugin\GlueApplication\EntityTagFormatResponseHeadersPlugin;
use Spryker\Glue\EntityTagsRestApi\Plugin\GlueApplication\EntityTagRestRequestValidatorPlugin;
use Spryker\Glue\GlueApplication\GlueApplicationDependencyProvider as SprykerGlueApplicationDependencyProvider;
use Spryker\Glue\GlueApplication\Plugin\GlueApplication\PaginationParametersValidateHttpRequestPlugin;
use Spryker\Glue\GlueApplication\Plugin\Rest\SetStoreCurrentLocaleBeforeActionPlugin;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRelationshipCollectionInterface;
use Spryker\Glue\NavigationsCategoryNodesResourceRelationship\Plugin\GlueApplication\CategoryNodeByResourceIdResourceRelationshipPlugin;
use Spryker\Glue\NavigationsRestApi\NavigationsRestApiConfig;
use Spryker\Glue\NavigationsRestApi\Plugin\ResourceRoute\NavigationsResourceRoutePlugin;
use Spryker\Glue\OrderPaymentsRestApi\Plugin\OrderPaymentsResourceRoutePlugin;
use Spryker\Glue\OrdersRestApi\Plugin\OrderRelationshipByOrderReferencePlugin;
use Spryker\Glue\OrdersRestApi\Plugin\OrdersResourceRoutePlugin;
use Spryker\Glue\ProductAvailabilitiesRestApi\Plugin\AbstractProductAvailabilitiesRoutePlugin;
use Spryker\Glue\ProductAvailabilitiesRestApi\Plugin\ConcreteProductAvailabilitiesRoutePlugin;
use Spryker\Glue\ProductAvailabilitiesRestApi\Plugin\GlueApplication\AbstractProductAvailabilitiesByResourceIdResourceRelationshipPlugin;
use Spryker\Glue\ProductAvailabilitiesRestApi\Plugin\GlueApplication\ConcreteProductAvailabilitiesByResourceIdResourceRelationshipPlugin;
use Spryker\Glue\ProductImageSetsRestApi\Plugin\AbstractProductImageSetsRoutePlugin;
use Spryker\Glue\ProductImageSetsRestApi\Plugin\ConcreteProductImageSetsRoutePlugin;
use Spryker\Glue\ProductImageSetsRestApi\Plugin\Relationship\AbstractProductsProductImageSetsResourceRelationshipPlugin;
use Spryker\Glue\ProductImageSetsRestApi\Plugin\Relationship\ConcreteProductsProductImageSetsResourceRelationshipPlugin;
use Spryker\Glue\ProductLabelsRestApi\Plugin\GlueApplication\ProductLabelsRelationshipByResourceIdPlugin;
use Spryker\Glue\ProductLabelsRestApi\Plugin\GlueApplication\ProductLabelsResourceRoutePlugin;
use Spryker\Glue\ProductPricesRestApi\Plugin\AbstractProductPricesRoutePlugin;
use Spryker\Glue\ProductPricesRestApi\Plugin\ConcreteProductPricesRoutePlugin;
use Spryker\Glue\ProductPricesRestApi\Plugin\GlueApplication\AbstractProductPricesByResourceIdResourceRelationshipPlugin;
use Spryker\Glue\ProductPricesRestApi\Plugin\GlueApplication\ConcreteProductPricesByResourceIdResourceRelationshipPlugin;
use Spryker\Glue\ProductPricesRestApi\Plugin\GlueApplication\CurrencyParameterValidatorPlugin;
use Spryker\Glue\ProductPricesRestApi\Plugin\GlueApplication\PriceModeParameterValidatorPlugin;
use Spryker\Glue\ProductPricesRestApi\Plugin\GlueApplication\SetCurrencyBeforeActionPlugin;
use Spryker\Glue\ProductPricesRestApi\Plugin\GlueApplication\SetPriceModeBeforeActionPlugin;
use Spryker\Glue\ProductsCategoriesResourceRelationship\Plugin\AbstractProductsCategoriesResourceRelationshipPlugin;
use Spryker\Glue\ProductsRestApi\Plugin\AbstractProductsResourceRoutePlugin;
use Spryker\Glue\ProductsRestApi\Plugin\ConcreteProductsResourceRoutePlugin;
use Spryker\Glue\ProductsRestApi\Plugin\GlueApplication\ConcreteProductBySkuResourceRelationshipPlugin;
use Spryker\Glue\ProductsRestApi\ProductsRestApiConfig;
use Spryker\Glue\ProductTaxSetsRestApi\Plugin\GlueApplication\ProductTaxSetByProductAbstractSkuResourceRelationshipPlugin;
use Spryker\Glue\ProductTaxSetsRestApi\Plugin\GlueApplication\ProductTaxSetsResourceRoutePlugin;
use Spryker\Glue\RelatedProductsRestApi\Plugin\GlueApplication\RelatedProductsResourceRoutePlugin;
use Spryker\Glue\RestRequestValidator\Plugin\ValidateRestRequestAttributesPlugin;
use Spryker\Glue\SharedCartsRestApi\Plugin\GlueApplication\SharedCartByCartIdResourceRelationshipPlugin;
use Spryker\Glue\SharedCartsRestApi\Plugin\GlueApplication\SharedCartsResourceRoutePlugin;
use Spryker\Glue\SharedCartsRestApi\SharedCartsRestApiConfig;
use Spryker\Glue\StoresRestApi\Plugin\StoresResourceRoutePlugin;
use Spryker\Glue\UpSellingProductsRestApi\Plugin\GlueApplication\CartUpSellingProductsResourceRoutePlugin;
use Spryker\Glue\UpSellingProductsRestApi\Plugin\GlueApplication\GuestCartUpSellingProductsResourceRoutePlugin;
use Spryker\Glue\WishlistsRestApi\Plugin\WishlistItemsResourceRoutePlugin;
use Spryker\Glue\WishlistsRestApi\Plugin\WishlistRelationshipByResourceIdPlugin;
use Spryker\Glue\WishlistsRestApi\Plugin\WishlistsResourceRoutePlugin;
use Spryker\Glue\WishlistsRestApi\WishlistsRestApiConfig;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
 */
class GlueApplicationDependencyProvider extends SprykerGlueApplicationDependencyProvider
{
    /**
     * {@inheritdoc}
     *
     * @return \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRoutePluginInterface[]
     */
    protected function getResourceRoutePlugins(): array
    {
        return [
            new AccessTokensResourceRoutePlugin(),
            new RefreshTokensResourceRoutePlugin(),
            new CatalogSearchResourceRoutePlugin(),
            new StoresResourceRoutePlugin(),
            new CatalogSearchSuggestionsResourceRoutePlugin(),
            new ConcreteProductAvailabilitiesRoutePlugin(),
            new AbstractProductAvailabilitiesRoutePlugin(),
            new CategoriesResourceRoutePlugin(),
            new CategoryResourceRoutePlugin(),
            new CustomersResourceRoutePlugin(),
            new CustomerForgottenPasswordResourceRoutePlugin(),
            new CustomerRestorePasswordResourceRoutePlugin(),
            new AbstractProductsResourceRoutePlugin(),
            new ConcreteProductsResourceRoutePlugin(),
            new AbstractProductPricesRoutePlugin(),
            new ConcreteProductPricesRoutePlugin(),
            new CartsResourceRoutePlugin(),
            new CartItemsResourceRoutePlugin(),
            new AbstractProductImageSetsRoutePlugin(),
            new ConcreteProductImageSetsRoutePlugin(),
            new OrdersResourceRoutePlugin(),
            new WishlistsResourceRoutePlugin(),
            new WishlistItemsResourceRoutePlugin(),
            new ProductTaxSetsResourceRoutePlugin(),
            new CustomerPasswordResourceRoutePlugin(),
            new AddressesResourceRoutePlugin(),
            new GuestCartsResourceRoutePlugin(),
            new GuestCartItemsResourceRoutePlugin(),
            new ProductLabelsResourceRoutePlugin(),
            new CheckoutDataResourcePlugin(),
            new CheckoutResourcePlugin(),
            new CompanyUsersResourceRoutePlugin(),
            new ConcreteAlternativeProductsResourceRoutePlugin(),
            new AbstractAlternativeProductsResourceRoutePlugin(),
            new CompanyUserAccessTokensResourceRoutePlugin(),
            new NavigationsResourceRoutePlugin(),
            new RelatedProductsResourceRoutePlugin(),
            new CartUpSellingProductsResourceRoutePlugin(),
            new GuestCartUpSellingProductsResourceRoutePlugin(),
            new ContentBannerResourceRoutePlugin(),
            new CartPermissionGroupsResourceRoutePlugin(),
            new ContentProductAbstractListRoutePlugin(),
            new OrderPaymentsResourceRoutePlugin(),
            new CompanyBusinessUnitAddressesResourcePlugin(),
            new CompanyRolesResourcePlugin(),
            new CompaniesResourcePlugin(),
            new CompanyBusinessUnitsResourcePlugin(),
            new SharedCartsResourceRoutePlugin(),
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @return \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ValidateRestRequestPluginInterface[]
     */
    protected function getValidateRestRequestPlugins(): array
    {
        return [
            new AnonymousCustomerUniqueIdValidatorPlugin(),
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @return \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\RestRequestValidatorPluginInterface[]
     */
    protected function getRestRequestValidatorPlugins(): array
    {
        return [
            new AccessTokenRestRequestValidatorPlugin(),
            new ValidateRestRequestAttributesPlugin(),
            new CurrencyParameterValidatorPlugin(),
            new PriceModeParameterValidatorPlugin(),
            new EntityTagRestRequestValidatorPlugin(),
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @return \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ValidateHttpRequestPluginInterface[]
     */
    protected function getValidateHttpRequestPlugins(): array
    {
        return [
            new PaginationParametersValidateHttpRequestPlugin(),
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @return \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\FormatResponseHeadersPluginInterface[]
     */
    protected function getFormatResponseHeadersPlugins(): array
    {
        return [
            new FormatAuthenticationErrorResponseHeadersPlugin(),
            new EntityTagFormatResponseHeadersPlugin(),
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @return \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ControllerBeforeActionPluginInterface[]
     */
    protected function getControllerBeforeActionPlugins(): array
    {
        return [
            new SetStoreCurrentLocaleBeforeActionPlugin(),
            new SetAnonymousCustomerIdControllerBeforeActionPlugin(),
            new SetCustomerBeforeActionPlugin(),
            new SetCurrencyBeforeActionPlugin(),
            new SetPriceModeBeforeActionPlugin(),
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @param \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRelationshipCollectionInterface $resourceRelationshipCollection
     *
     * @return \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRelationshipCollectionInterface
     */
    protected function getResourceRelationshipPlugins(
        ResourceRelationshipCollectionInterface $resourceRelationshipCollection
    ): ResourceRelationshipCollectionInterface {
        $resourceRelationshipCollection->addRelationship(
            ProductsRestApiConfig::RESOURCE_ABSTRACT_PRODUCTS,
            new AbstractProductsProductImageSetsResourceRelationshipPlugin()
        );
        $resourceRelationshipCollection->addRelationship(
            ProductsRestApiConfig::RESOURCE_CONCRETE_PRODUCTS,
            new ConcreteProductsProductImageSetsResourceRelationshipPlugin()
        );
        $resourceRelationshipCollection->addRelationship(
            CartsRestApiConfig::RESOURCE_CART_ITEMS,
            new ConcreteProductBySkuResourceRelationshipPlugin()
        );
        $resourceRelationshipCollection->addRelationship(
            CartsRestApiConfig::RESOURCE_GUEST_CARTS_ITEMS,
            new ConcreteProductBySkuResourceRelationshipPlugin()
        );
        $resourceRelationshipCollection->addRelationship(
            WishlistsRestApiConfig::RESOURCE_WISHLIST_ITEMS,
            new ConcreteProductBySkuResourceRelationshipPlugin()
        );
        $resourceRelationshipCollection->addRelationship(
            CatalogSearchRestApiConfig::RESOURCE_CATALOG_SEARCH,
            new CatalogSearchAbstractProductsResourceRelationshipPlugin()
        );
        $resourceRelationshipCollection->addRelationship(
            CatalogSearchRestApiConfig::RESOURCE_CATALOG_SEARCH_SUGGESTIONS,
            new CatalogSearchSuggestionsAbstractProductsResourceRelationshipPlugin()
        );
        $resourceRelationshipCollection->addRelationship(
            ProductsRestApiConfig::RESOURCE_ABSTRACT_PRODUCTS,
            new AbstractProductAvailabilitiesByResourceIdResourceRelationshipPlugin()
        );
        $resourceRelationshipCollection->addRelationship(
            ProductsRestApiConfig::RESOURCE_CONCRETE_PRODUCTS,
            new ConcreteProductAvailabilitiesByResourceIdResourceRelationshipPlugin()
        );
        $resourceRelationshipCollection->addRelationship(
            ProductsRestApiConfig::RESOURCE_ABSTRACT_PRODUCTS,
            new AbstractProductPricesByResourceIdResourceRelationshipPlugin()
        );
        $resourceRelationshipCollection->addRelationship(
            ProductsRestApiConfig::RESOURCE_CONCRETE_PRODUCTS,
            new ConcreteProductPricesByResourceIdResourceRelationshipPlugin()
        );
        $resourceRelationshipCollection->addRelationship(
            ProductsRestApiConfig::RESOURCE_ABSTRACT_PRODUCTS,
            new AbstractProductsCategoriesResourceRelationshipPlugin()
        );
        $resourceRelationshipCollection->addRelationship(
            ProductsRestApiConfig::RESOURCE_ABSTRACT_PRODUCTS,
            new ProductTaxSetByProductAbstractSkuResourceRelationshipPlugin()
        );
        $resourceRelationshipCollection->addRelationship(
            CustomersRestApiConfig::RESOURCE_CUSTOMERS,
            new CustomersToAddressesRelationshipPlugin()
        );
        $resourceRelationshipCollection->addRelationship(
            CustomersRestApiConfig::RESOURCE_CUSTOMERS,
            new WishlistRelationshipByResourceIdPlugin()
        );
        $resourceRelationshipCollection->addRelationship(
            ProductsRestApiConfig::RESOURCE_ABSTRACT_PRODUCTS,
            new ProductLabelsRelationshipByResourceIdPlugin()
        );
        $resourceRelationshipCollection->addRelationship(
            CheckoutRestApiConfig::RESOURCE_CHECKOUT,
            new OrderRelationshipByOrderReferencePlugin()
        );
        $resourceRelationshipCollection->addRelationship(
            CompanyUsersRestApiConfig::RESOURCE_COMPANY_USERS,
            new CompanyByCompanyUserResourceRelationshipPlugin()
        );
        $resourceRelationshipCollection->addRelationship(
            CompanyUsersRestApiConfig::RESOURCE_COMPANY_USERS,
            new CompanyBusinessUnitByCompanyUserResourceRelationshipPlugin()
        );
        $resourceRelationshipCollection->addRelationship(
            CompanyUsersRestApiConfig::RESOURCE_COMPANY_USERS,
            new CompanyRoleByCompanyUserResourceRelationshipPlugin()
        );
        $resourceRelationshipCollection->addRelationship(
            NavigationsRestApiConfig::RESOURCE_NAVIGATIONS,
            new CategoryNodeByResourceIdResourceRelationshipPlugin()
        );
        $resourceRelationshipCollection->addRelationship(
            CompanyRolesRestApiConfig::RESOURCE_COMPANY_ROLES,
            new CompanyByCompanyRoleResourceRelationshipPlugin()
        );
        $resourceRelationshipCollection->addRelationship(
            CompanyBusinessUnitsRestApiConfig::RESOURCE_COMPANY_BUSINESS_UNITS,
            new CompanyByCompanyBusinessUnitResourceRelationshipPlugin()
        );
        $resourceRelationshipCollection->addRelationship(
            CompanyBusinessUnitsRestApiConfig::RESOURCE_COMPANY_BUSINESS_UNITS,
            new CompanyBusinessUnitAddressesByCompanyBusinessUnitResourceRelationshipPlugin()
        );
        $resourceRelationshipCollection->addRelationship(
            CompanyUsersRestApiConfig::RESOURCE_COMPANY_USERS,
            new CustomerByCompanyUserResourceRelationshipPlugin()
        );
        $resourceRelationshipCollection->addRelationship(
            CartsRestApiConfig::RESOURCE_CARTS,
            new CartPermissionGroupByQuoteResourceRelationshipPlugin()
        );
        $resourceRelationshipCollection->addRelationship(
            CartsRestApiConfig::RESOURCE_CARTS,
            new SharedCartByCartIdResourceRelationshipPlugin()
        );
        $resourceRelationshipCollection->addRelationship(
            SharedCartsRestApiConfig::RESOURCE_SHARED_CARTS,
            new CartPermissionGroupByShareDetailResourceRelationshipPlugin()
        );
        $resourceRelationshipCollection->addRelationship(
            SharedCartsRestApiConfig::RESOURCE_SHARED_CARTS,
            new CompanyUserByShareDetailResourceRelationshipPlugin()
        );

        return $resourceRelationshipCollection;
    }

    /**
     * @return \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\RestUserFinderPluginInterface[]
     */
    protected function getRestUserFinderPlugins(): array
    {
        return [
            new RestUserFinderByAccessTokenPlugin(),
        ];
    }
}
