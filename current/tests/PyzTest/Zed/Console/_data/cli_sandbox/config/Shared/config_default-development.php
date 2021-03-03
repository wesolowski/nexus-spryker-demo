<?php

/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a development environment.
 */

use Pyz\Shared\Console\ConsoleConstants;
use Spryker\Shared\Acl\AclConstants;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\ErrorHandler\ErrorHandlerConstants;
use Spryker\Shared\ErrorHandler\ErrorRenderer\WebExceptionErrorRenderer;
use Spryker\Shared\Kernel\KernelConstants;
use Spryker\Shared\Kernel\Store;
use Spryker\Shared\Log\LogConstants;
use Spryker\Shared\Propel\PropelConstants;
use Spryker\Shared\PropelOrm\PropelOrmConstants;
use Spryker\Shared\Session\SessionConstants;
use Spryker\Shared\Twig\TwigConstants;
use Spryker\Shared\ZedNavigation\ZedNavigationConstants;
use Spryker\Shared\ZedRequest\ZedRequestConstants;
use SprykerShop\Shared\ShopApplication\ShopApplicationConstants;

$config[SessionConstants::YVES_SESSION_COOKIE_DOMAIN] = $config[ApplicationConstants::HOST_YVES];
$config[SessionConstants::YVES_SESSION_COOKIE_SECURE] = false;

$config[ZedRequestConstants::TRANSFER_DEBUG_SESSION_FORWARD_ENABLED] = true;

$config[TwigConstants::ZED_TWIG_OPTIONS] = [
    'cache' => APPLICATION_ROOT_DIR . '/data/' . Store::getInstance()->getStoreName() . '/cache/Yves/twig',
];

$config[TwigConstants::YVES_TWIG_OPTIONS] = [
    'cache' => APPLICATION_ROOT_DIR . '/data/' . Store::getInstance()->getStoreName() . '/cache/Yves/twig',
];

$config[ZedNavigationConstants::ZED_NAVIGATION_CACHE_ENABLED] = true;

$config[AclConstants::ACL_USER_RULE_WHITELIST][] = [
    'bundle' => 'wdt',
    'controller' => '*',
    'action' => '*',
    'type' => 'allow',
];

$config[PropelConstants::PROPEL_DEBUG] = true;
$config[PropelOrmConstants::PROPEL_SHOW_EXTENDED_EXCEPTION] = true;

$config[ErrorHandlerConstants::DISPLAY_ERRORS] = true;
$config[ErrorHandlerConstants::ERROR_RENDERER] = WebExceptionErrorRenderer::class;

$config[ApplicationConstants::ENABLE_APPLICATION_DEBUG]
    = $config[ShopApplicationConstants::ENABLE_APPLICATION_DEBUG]
    = true;
$config[ZedRequestConstants::SET_REPEAT_DATA] = true;
$config[KernelConstants::STORE_PREFIX] = 'DEV';

$config[ApplicationConstants::ENABLE_WEB_PROFILER] = true;
$config[KernelConstants::AUTO_LOADER_UNRESOLVABLE_CACHE_ENABLED] = false;

$config[KernelConstants::SPRYKER_ROOT] = APPLICATION_ROOT_DIR . '/vendor/spryker/spryker/Bundles';

$config[LogConstants::LOG_LEVEL] = \Monolog\Logger::INFO;

$config[TwigConstants::YVES_PATH_CACHE_FILE] = APPLICATION_ROOT_DIR . '/data/' . Store::getInstance()->getStoreName() . '/cache/Yves/twig/.pathCache';
$config[TwigConstants::ZED_PATH_CACHE_FILE] = APPLICATION_ROOT_DIR . '/data/' . Store::getInstance()->getStoreName() . '/cache/Zed/twig/.pathCache';

$config[ApplicationConstants::ZED_SSL_ENABLED] = false;

$config[ConsoleConstants::ENABLE_DEVELOPMENT_CONSOLE_COMMANDS] = true;
