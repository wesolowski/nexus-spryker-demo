<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CmsContentWidget;

use Spryker\Shared\CmsContentWidgetCmsBlockConnector\ContentWidgetConfigurationProvider\CmsContentWidgetCmsBlockConnectorConfigurationProvider;
use Spryker\Shared\CmsContentWidgetProductConnector\ContentWidgetConfigurationProvider\CmsProductContentWidgetConfigurationProvider;
use Spryker\Shared\CmsContentWidgetProductGroupConnector\ContentWidgetConfigurationProvider\CmsProductGroupContentWidgetConfigurationProvider;
use Spryker\Shared\CmsContentWidgetProductSetConnector\ContentWidgetConfigurationProvider\CmsProductSetContentWidgetConfigurationProvider;
use Spryker\Zed\CmsContentWidget\CmsContentWidgetConfig as SprykerCmsContentConfig;
use SprykerShop\Shared\CmsContentWidgetChartConnector\ContentWidgetConfigurationProvider\CmsChartContentWidgetConfigurationProvider;
use SprykerShop\Shared\FileManagerWidget\CmsContentWidgetConfigurationProvider\FileManagerWidgetConfigurationProvider;

class CmsContentWidgetConfig extends SprykerCmsContentConfig
{
    /**
     * {@inheritdoc}
     *
     * @return array|\Spryker\Shared\CmsContentWidget\Dependency\CmsContentWidgetConfigurationProviderInterface[]
     */
    public function getCmsContentWidgetConfigurationProviders()
    {
        return [
            CmsChartContentWidgetConfigurationProvider::FUNCTION_NAME => new CmsChartContentWidgetConfigurationProvider(),
            CmsProductContentWidgetConfigurationProvider::FUNCTION_NAME => new CmsProductContentWidgetConfigurationProvider(),
            CmsProductSetContentWidgetConfigurationProvider::FUNCTION_NAME => new CmsProductSetContentWidgetConfigurationProvider(),
            CmsProductGroupContentWidgetConfigurationProvider::FUNCTION_NAME => new CmsProductGroupContentWidgetConfigurationProvider(),
            FileManagerWidgetConfigurationProvider::FUNCTION_NAME => new FileManagerWidgetConfigurationProvider(),
            CmsContentWidgetCmsBlockConnectorConfigurationProvider::FUNCTION_NAME => new CmsContentWidgetCmsBlockConnectorConfigurationProvider(),
        ];
    }
}
