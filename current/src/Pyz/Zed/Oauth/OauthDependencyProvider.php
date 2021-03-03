<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Oauth;

use Spryker\Zed\Oauth\OauthDependencyProvider as SprykerOauthDependencyProvider;
use Spryker\Zed\OauthCompanyUser\Communication\Plugin\Oauth\CompanyUserAccessTokenOauthGrantTypeConfigurationProviderPlugin;
use Spryker\Zed\OauthCompanyUser\Communication\Plugin\Oauth\CompanyUserAccessTokenOauthUserProviderPlugin;
use Spryker\Zed\OauthCompanyUser\Communication\Plugin\Oauth\CompanyUserOauthScopeProviderPlugin;
use Spryker\Zed\OauthCompanyUser\Communication\Plugin\Oauth\CompanyUserOauthUserProviderPlugin;
use Spryker\Zed\OauthCompanyUser\Communication\Plugin\Oauth\IdCompanyUserOauthGrantTypeConfigurationProviderPlugin;
use Spryker\Zed\OauthCustomerConnector\Communication\Plugin\Oauth\CustomerOauthScopeProviderPlugin;
use Spryker\Zed\OauthCustomerConnector\Communication\Plugin\Oauth\CustomerOauthUserProviderPlugin;
use Spryker\Zed\OauthPermission\Communication\Plugin\Filter\OauthUserIdentifierFilterPermissionPlugin;

class OauthDependencyProvider extends SprykerOauthDependencyProvider
{
    /**
     * @return \Spryker\Zed\OauthExtension\Dependency\Plugin\OauthUserProviderPluginInterface[]
     */
    protected function getUserProviderPlugins(): array
    {
        return [
            new CustomerOauthUserProviderPlugin(),
            new CompanyUserOauthUserProviderPlugin(),
            new CompanyUserAccessTokenOauthUserProviderPlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\OauthExtension\Dependency\Plugin\OauthScopeProviderPluginInterface[]
     */
    protected function getScopeProviderPlugins(): array
    {
        return [
            new CustomerOauthScopeProviderPlugin(),
            new CompanyUserOauthScopeProviderPlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\OauthExtension\Dependency\Plugin\OauthGrantTypeConfigurationProviderPluginInterface[]
     */
    protected function getGrantTypeConfigurationProviderPlugins(): array
    {
        return array_merge(parent::getGrantTypeConfigurationProviderPlugins(), [
            new IdCompanyUserOauthGrantTypeConfigurationProviderPlugin(),
            new CompanyUserAccessTokenOauthGrantTypeConfigurationProviderPlugin(),
        ]);
    }

    /**
     * @return \Spryker\Zed\OauthExtension\Dependency\Plugin\OauthUserIdentifierFilterPluginInterface[]
     */
    protected function getOauthUserIdentifierFilterPlugins(): array
    {
        return [
            new OauthUserIdentifierFilterPermissionPlugin(),
        ];
    }
}
