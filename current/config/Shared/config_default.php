<?php

use Monolog\Logger;
use Spryker\Client\RabbitMq\Model\RabbitMqAdapter;
use Spryker\Glue\Log\Plugin\GlueLoggerConfigPlugin;
use Spryker\Service\FlysystemLocalFileSystem\Plugin\Flysystem\LocalFilesystemBuilderPlugin;
use Spryker\Shared\Acl\AclConstants;
use Spryker\Shared\Api\ApiConstants;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Auth\AuthConstants;
use Spryker\Shared\CmsGui\CmsGuiConstants;
use Spryker\Shared\Collector\CollectorConstants;
use Spryker\Shared\Customer\CustomerConstants;
use Spryker\Shared\DocumentationGeneratorRestApi\DocumentationGeneratorRestApiConstants;
use Spryker\Shared\DummyPayment\DummyPaymentConfig;
use Spryker\Shared\ErrorHandler\ErrorHandlerConstants;
use Spryker\Shared\ErrorHandler\ErrorRenderer\WebHtmlErrorRenderer;
use Spryker\Shared\Event\EventConstants;
use Spryker\Shared\EventBehavior\EventBehaviorConstants;
use Spryker\Shared\FileManager\FileManagerConstants;
use Spryker\Shared\FileManagerGui\FileManagerGuiConstants;
use Spryker\Shared\FileSystem\FileSystemConstants;
use Spryker\Shared\Flysystem\FlysystemConstants;
use Spryker\Shared\GlueApplication\GlueApplicationConstants;
use Spryker\Shared\Kernel\ClassResolver\Cache\Provider\File;
use Spryker\Shared\Kernel\KernelConstants;
use Spryker\Shared\Kernel\Store;
use Spryker\Shared\Log\LogConstants;
use Spryker\Shared\Monitoring\MonitoringConstants;
use Spryker\Shared\Nopayment\NopaymentConfig;
use Spryker\Shared\Nopayment\NopaymentConstants;
use Spryker\Shared\Oauth\OauthConstants;
use Spryker\Shared\Oms\OmsConstants;
use Spryker\Shared\Propel\PropelConstants;
use Spryker\Shared\Queue\QueueConfig;
use Spryker\Shared\Queue\QueueConstants;
use Spryker\Shared\Quote\QuoteConstants;
use Spryker\Shared\Sales\SalesConstants;
use Spryker\Shared\Search\SearchConstants;
use Spryker\Shared\SequenceNumber\SequenceNumberConstants;
use Spryker\Shared\Session\SessionConfig;
use Spryker\Shared\Session\SessionConstants;
use Spryker\Shared\SessionFile\SessionFileConstants;
use Spryker\Shared\SessionRedis\SessionRedisConfig;
use Spryker\Shared\SessionRedis\SessionRedisConstants;
use Spryker\Shared\Storage\StorageConstants;
use Spryker\Shared\StorageRedis\StorageRedisConstants;
use Spryker\Shared\Tax\TaxConstants;
use Spryker\Shared\Translator\TranslatorConstants;
use Spryker\Shared\Twig\TwigConstants;
use Spryker\Shared\User\UserConstants;
use Spryker\Shared\ZedNavigation\ZedNavigationConstants;
use Spryker\Shared\ZedRequest\ZedRequestConstants;
use Spryker\Yves\Log\Plugin\YvesLoggerConfigPlugin;
use Spryker\Zed\GiftCard\GiftCardConfig;
use Spryker\Zed\Log\Communication\Plugin\ZedLoggerConfigPlugin;
use Spryker\Zed\Oms\OmsConfig;
use Spryker\Zed\Propel\PropelConfig;
use SprykerEco\Shared\Loggly\LogglyConstants;
use SprykerShop\Shared\CalculationPage\CalculationPageConstants;
use SprykerShop\Shared\ErrorPage\ErrorPageConstants;
use SprykerShop\Shared\ShopApplication\ShopApplicationConstants;
use SprykerShop\Shared\ShopUi\ShopUiConstants;
use Twig\Cache\FilesystemCache;

$CURRENT_STORE = Store::getInstance()->getStoreName();

// ---------- General environment
$config[KernelConstants::SPRYKER_ROOT] = APPLICATION_ROOT_DIR . '/vendor/spryker';
$config[ApplicationConstants::PROJECT_TIMEZONE] = 'UTC';
$config[ApplicationConstants::ENABLE_WEB_PROFILER] = false;

$ENVIRONMENT_PREFIX = '';
$config[SequenceNumberConstants::ENVIRONMENT_PREFIX] = $ENVIRONMENT_PREFIX;
$config[SalesConstants::ENVIRONMENT_PREFIX] = $ENVIRONMENT_PREFIX;

// ---------- Namespaces
$config[KernelConstants::PROJECT_NAMESPACE] = 'Pyz';
$config[KernelConstants::PROJECT_NAMESPACES] = [
    'Pyz',
];
$config[KernelConstants::CORE_NAMESPACES] = [
    'SprykerShop',
    'SprykerMiddleware',
    'SprykerEco',
    'Spryker',
    'SprykerSdk',
];

// ---------- Propel
$config[PropelConstants::ZED_DB_ENGINE_MYSQL] = PropelConfig::DB_ENGINE_MYSQL;
$config[PropelConstants::ZED_DB_ENGINE_PGSQL] = PropelConfig::DB_ENGINE_PGSQL;
$config[PropelConstants::ZED_DB_SUPPORTED_ENGINES] = [
    PropelConfig::DB_ENGINE_MYSQL => 'MySql',
    PropelConfig::DB_ENGINE_PGSQL => 'PostgreSql',
];

$config[PropelConstants::USE_SUDO_TO_MANAGE_DATABASE] = true;
$config[PropelConstants::PROPEL_DEBUG] = false;

// ---------- Authentication
$config[UserConstants::USER_SYSTEM_USERS] = [
    'yves_system',
];
// For a better performance you can turn off Zed authentication
$AUTH_ZED_ENABLED = false;
$config[AuthConstants::AUTH_ZED_ENABLED] = $AUTH_ZED_ENABLED;
$config[ZedRequestConstants::AUTH_ZED_ENABLED] = $AUTH_ZED_ENABLED;
$config[AuthConstants::AUTH_DEFAULT_CREDENTIALS] = [
    'yves_system' => [
        'rules' => [
            [
                'bundle' => '*',
                'controller' => 'gateway',
                'action' => '*',
            ],
        ],
        // Please replace this token for your project
        'token' => 'JDJ5JDEwJFE0cXBwYnVVTTV6YVZXSnVmM2l1UWVhRE94WkQ4UjBUeHBEWTNHZlFRTEd4U2F6QVBqejQ2',
    ],
];

// ---------- ACL
// ACL: Allow or disallow of urls for Zed Admin GUI for ALL users
$config[AclConstants::ACL_DEFAULT_RULES] = [
    [
        'bundle' => 'auth',
        'controller' => '*',
        'action' => '*',
        'type' => 'allow',
    ],
    [
        'bundle' => 'acl',
        'controller' => 'index',
        'action' => 'denied',
        'type' => 'allow',
    ],
    [
        'bundle' => 'heartbeat',
        'controller' => 'index',
        'action' => 'index',
        'type' => 'allow',
    ],
];
// ACL: Allow or disallow of urls for Zed Admin GUI
$config[AclConstants::ACL_USER_RULE_WHITELIST] = [
    [
        'bundle' => 'application',
        'controller' => '*',
        'action' => '*',
        'type' => 'allow',
    ],
];
// ACL: Special rules for specific users
$config[AclConstants::ACL_DEFAULT_CREDENTIALS] = [
    'yves_system' => [
        'rules' => [
            [
                'bundle' => '*',
                'controller' => 'gateway',
                'action' => '*',
                'type' => 'allow',
            ],
        ],
    ],
];

// ---------- Elasticsearch
$ELASTICA_HOST = 'localhost';
$config[SearchConstants::ELASTICA_PARAMETER__HOST] = $ELASTICA_HOST;
$ELASTICA_TRANSPORT_PROTOCOL = 'http';
$config[SearchConstants::ELASTICA_PARAMETER__TRANSPORT] = $ELASTICA_TRANSPORT_PROTOCOL;
$ELASTICA_PORT = '10005';
$config[SearchConstants::ELASTICA_PARAMETER__PORT] = $ELASTICA_PORT;
$ELASTICA_AUTH_HEADER = null;
$config[SearchConstants::ELASTICA_PARAMETER__AUTH_HEADER] = $ELASTICA_AUTH_HEADER;
$ELASTICA_INDEX_NAME = null;// Store related config
$config[SearchConstants::ELASTICA_PARAMETER__INDEX_NAME] = $ELASTICA_INDEX_NAME;
$config[CollectorConstants::ELASTICA_PARAMETER__INDEX_NAME] = $ELASTICA_INDEX_NAME;
$ELASTICA_DOCUMENT_TYPE = 'page';
$config[SearchConstants::ELASTICA_PARAMETER__DOCUMENT_TYPE] = $ELASTICA_DOCUMENT_TYPE;
$config[CollectorConstants::ELASTICA_PARAMETER__DOCUMENT_TYPE] = $ELASTICA_DOCUMENT_TYPE;
$ELASTICA_PARAMETER__EXTRA = [];
$config[SearchConstants::ELASTICA_PARAMETER__EXTRA] = $ELASTICA_PARAMETER__EXTRA;

// ---------- Page search
$config[SearchConstants::FULL_TEXT_BOOSTED_BOOSTING_VALUE] = 3;
$config[SearchConstants::SEARCH_INDEX_NAME_SUFFIX] = '';

// ---------- Twig
$config[TwigConstants::YVES_TWIG_OPTIONS] = [
    'cache' => new FilesystemCache(
        sprintf(
            '%s/data/%s/cache/Yves/twig',
            APPLICATION_ROOT_DIR,
            $CURRENT_STORE
        ),
        FilesystemCache::FORCE_BYTECODE_INVALIDATION
    ),
];
$config[TwigConstants::ZED_TWIG_OPTIONS] = [
    'cache' => new FilesystemCache(
        sprintf(
            '%s/data/%s/cache/Zed/twig',
            APPLICATION_ROOT_DIR,
            $CURRENT_STORE
        ),
        FilesystemCache::FORCE_BYTECODE_INVALIDATION
    ),
];
$config[TwigConstants::YVES_PATH_CACHE_FILE] = sprintf(
    '%s/data/%s/cache/Yves/twig/.pathCache',
    APPLICATION_ROOT_DIR,
    $CURRENT_STORE
);
$config[TwigConstants::ZED_PATH_CACHE_FILE] = sprintf(
    '%s/data/%s/cache/Zed/twig/.pathCache',
    APPLICATION_ROOT_DIR,
    $CURRENT_STORE
);

// ---------- Navigation
// The cache should always be activated. Refresh/build with CLI command: vendor/bin/console application:build-navigation-cache
$config[ZedNavigationConstants::ZED_NAVIGATION_CACHE_ENABLED] = true;

// ---------- Zed request
$config[ZedRequestConstants::TRANSFER_DEBUG_SESSION_FORWARD_ENABLED] = false;
$config[ZedRequestConstants::TRANSFER_DEBUG_SESSION_NAME] = 'XDEBUG_SESSION';

// ---------- KV storage
$config[StorageConstants::STORAGE_KV_SOURCE] = 'redis';

/**
 * Data source names are used exclusively when set, e.g. no other Redis storage configuration will be used for the client.
 *
 * Example:
 *   $config[StorageRedisConstants::STORAGE_REDIS_DATA_SOURCE_NAMES] = ['tcp://127.0.0.1:10009', 'tcp://10.0.0.1:6379']
 */
//$config[StorageRedisConstants::STORAGE_REDIS_DATA_SOURCE_NAMES] = [];

$config[StorageRedisConstants::STORAGE_REDIS_PERSISTENT_CONNECTION] = true;
$config[StorageRedisConstants::STORAGE_REDIS_PROTOCOL] = 'tcp';
$config[StorageRedisConstants::STORAGE_REDIS_HOST] = '127.0.0.1';
$config[StorageRedisConstants::STORAGE_REDIS_PORT] = 10009;
$config[StorageRedisConstants::STORAGE_REDIS_PASSWORD] = false;
$config[StorageRedisConstants::STORAGE_REDIS_DATABASE] = 0;

// ---------- Session
$config[SessionConstants::YVES_SESSION_SAVE_HANDLER] = SessionRedisConfig::SESSION_HANDLER_REDIS_LOCKING;
$config[SessionConstants::YVES_SESSION_TIME_TO_LIVE] = SessionConfig::SESSION_LIFETIME_1_HOUR;
$config[SessionRedisConstants::YVES_SESSION_TIME_TO_LIVE] = $config[SessionConstants::YVES_SESSION_TIME_TO_LIVE];
$config[SessionFileConstants::YVES_SESSION_TIME_TO_LIVE] = $config[SessionConstants::YVES_SESSION_TIME_TO_LIVE];
$config[SessionConstants::YVES_SESSION_COOKIE_TIME_TO_LIVE] = SessionConfig::SESSION_LIFETIME_0_5_HOUR;
$config[SessionFileConstants::YVES_SESSION_FILE_PATH] = session_save_path();
$config[SessionConstants::YVES_SESSION_PERSISTENT_CONNECTION] = $config[StorageRedisConstants::STORAGE_REDIS_PERSISTENT_CONNECTION];
$config[SessionConstants::ZED_SESSION_SAVE_HANDLER] = SessionRedisConfig::SESSION_HANDLER_REDIS;
$config[SessionConstants::ZED_SESSION_TIME_TO_LIVE] = SessionConfig::SESSION_LIFETIME_1_HOUR;
$config[SessionRedisConstants::ZED_SESSION_TIME_TO_LIVE] = $config[SessionConstants::ZED_SESSION_TIME_TO_LIVE];
$config[SessionFileConstants::ZED_SESSION_TIME_TO_LIVE] = $config[SessionConstants::ZED_SESSION_TIME_TO_LIVE];
$config[SessionConstants::ZED_SESSION_COOKIE_TIME_TO_LIVE] = SessionConfig::SESSION_LIFETIME_BROWSER_SESSION;
$config[SessionFileConstants::ZED_SESSION_FILE_PATH] = session_save_path();
$config[SessionConstants::ZED_SESSION_PERSISTENT_CONNECTION] = $config[StorageRedisConstants::STORAGE_REDIS_PERSISTENT_CONNECTION];
$config[SessionRedisConstants::LOCKING_TIMEOUT_MILLISECONDS] = 0;
$config[SessionRedisConstants::LOCKING_RETRY_DELAY_MICROSECONDS] = 0;
$config[SessionRedisConstants::LOCKING_LOCK_TTL_MILLISECONDS] = 0;

/**
 * Data source names are used exclusively when set, e.g. no other Redis session configuration will be used for the client.
 *
 * Example:
 *   $config[SessionRedisConstants::YVES_SESSION_REDIS_DATA_SOURCE_NAMES] = ['tcp://127.0.0.1:10009', 'tcp://10.0.0.1:6379']
 */
//$config[SessionRedisConstants::YVES_SESSION_REDIS_DATA_SOURCE_NAMES] = [];

$config[SessionRedisConstants::YVES_SESSION_REDIS_PROTOCOL] = $config[StorageRedisConstants::STORAGE_REDIS_PROTOCOL];
$config[SessionRedisConstants::YVES_SESSION_REDIS_HOST] = $config[StorageRedisConstants::STORAGE_REDIS_HOST];
$config[SessionRedisConstants::YVES_SESSION_REDIS_PORT] = $config[StorageRedisConstants::STORAGE_REDIS_PORT];
$config[SessionRedisConstants::YVES_SESSION_REDIS_PASSWORD] = $config[StorageRedisConstants::STORAGE_REDIS_PASSWORD];
$config[SessionRedisConstants::YVES_SESSION_REDIS_DATABASE] = 1;

/**
 * Data source names are used exclusively when set, e.g. no other Redis session configuration will be used for the client.
 *
 * Example:
 *   $config[SessionRedisConstants::ZED_SESSION_REDIS_DATA_SOURCE_NAMES] = ['tcp://127.0.0.1:10009', 'tcp://10.0.0.1:6379']
 */
//$config[SessionRedisConstants::ZED_SESSION_REDIS_DATA_SOURCE_NAMES] = [];

$config[SessionRedisConstants::ZED_SESSION_REDIS_PROTOCOL] = $config[StorageRedisConstants::STORAGE_REDIS_PROTOCOL];
$config[SessionRedisConstants::ZED_SESSION_REDIS_HOST] = $config[StorageRedisConstants::STORAGE_REDIS_HOST];
$config[SessionRedisConstants::ZED_SESSION_REDIS_PORT] = $config[StorageRedisConstants::STORAGE_REDIS_PORT];
$config[SessionRedisConstants::ZED_SESSION_REDIS_PASSWORD] = $config[StorageRedisConstants::STORAGE_REDIS_PASSWORD];
$config[SessionRedisConstants::ZED_SESSION_REDIS_DATABASE] = 2;

// ---------- Cookie
$config[ApplicationConstants::YVES_COOKIE_DEVICE_ID_NAME] = 'did';
$config[ApplicationConstants::YVES_COOKIE_DEVICE_ID_VALID_FOR] = '+5 year';
$config[ApplicationConstants::YVES_COOKIE_VISITOR_ID_NAME] = 'vid';
$config[ApplicationConstants::YVES_COOKIE_VISITOR_ID_VALID_FOR] = '+30 minute';

// ---------- HTTP strict transport security
$HSTS_ENABLED = false;
$config[ApplicationConstants::ZED_HTTP_STRICT_TRANSPORT_SECURITY_ENABLED] = $HSTS_ENABLED;
$config[ApplicationConstants::YVES_HTTP_STRICT_TRANSPORT_SECURITY_ENABLED] = $HSTS_ENABLED;
$HSTS_CONFIG = [
    'max_age' => 31536000,
    'include_sub_domains' => true,
    'preload' => true,
];
$config[ApplicationConstants::ZED_HTTP_STRICT_TRANSPORT_SECURITY_CONFIG] = $HSTS_CONFIG;
$config[ApplicationConstants::YVES_HTTP_STRICT_TRANSPORT_SECURITY_CONFIG] = $HSTS_CONFIG;

// ---------- SSL
$config[SessionConstants::YVES_SSL_ENABLED] = false;
$config[ApplicationConstants::YVES_SSL_ENABLED] =
$config[SessionConstants::YVES_SSL_ENABLED]
    = false;
$config[ApplicationConstants::YVES_SSL_EXCLUDED] = [
    'heartbeat' => '/heartbeat',
];

$config[ZedRequestConstants::ZED_API_SSL_ENABLED] = false;
$config[ApplicationConstants::ZED_SSL_ENABLED] =
    $config[SessionConstants::ZED_SSL_ENABLED]
    = false;
$config[ApplicationConstants::ZED_SSL_EXCLUDED] = ['heartbeat/index'];

// ---------- Error handling
$config[ErrorHandlerConstants::YVES_ERROR_PAGE] = APPLICATION_ROOT_DIR . '/public/Yves/errorpage/error.html';
$config[ErrorHandlerConstants::ZED_ERROR_PAGE] = APPLICATION_ROOT_DIR . '/public/Zed/errorpage/error.html';
$config[ErrorHandlerConstants::ERROR_RENDERER] = WebHtmlErrorRenderer::class;
// Due to some deprecation notices we silence all deprecations for the time being
$config[ErrorHandlerConstants::ERROR_LEVEL] = E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED;
// To only log e.g. deprecations instead of throwing exceptions here use
//$config[ErrorHandlerConstants::ERROR_LEVEL] = E_ALL
//$config[ErrorHandlerConstants::ERROR_LEVEL_LOG_ONLY] = E_DEPRECATED | E_USER_DEPRECATED;

// ---------- Logging
$config[LogConstants::LOGGER_CONFIG_ZED] = ZedLoggerConfigPlugin::class;
$config[LogConstants::LOGGER_CONFIG_YVES] = YvesLoggerConfigPlugin::class;
$config[LogConstants::LOGGER_CONFIG_GLUE] = GlueLoggerConfigPlugin::class;

$config[LogConstants::LOG_LEVEL] = Logger::INFO;

$baseLogFilePath = sprintf('%s/data/%s/logs', APPLICATION_ROOT_DIR, $CURRENT_STORE);

$config[LogConstants::LOG_FILE_PATH_YVES] = $baseLogFilePath . '/YVES/application.log';
$config[LogConstants::LOG_FILE_PATH_ZED] = $baseLogFilePath . '/ZED/application.log';
$config[LogConstants::LOG_FILE_PATH_GLUE] = $baseLogFilePath . '/GLUE/application.log';

$config[LogConstants::EXCEPTION_LOG_FILE_PATH_YVES] = $baseLogFilePath . '/YVES/exception.log';
$config[LogConstants::EXCEPTION_LOG_FILE_PATH_ZED] = $baseLogFilePath . '/ZED/exception.log';
$config[LogConstants::EXCEPTION_LOG_FILE_PATH_GLUE] = $baseLogFilePath . '/GLUE/exception.log';
$config[LogConstants::LOG_FOLDER_PATH_INSTALLATION] = sprintf('%s/data/install/logs', APPLICATION_ROOT_DIR);

$config[LogConstants::LOG_SANITIZE_FIELDS] = [
    'password',
];

$config[LogConstants::LOG_QUEUE_NAME] = 'log-queue';
$config[LogConstants::LOG_ERROR_QUEUE_NAME] = 'error-log-queue';

// ---------- Auto-loader
$config[KernelConstants::AUTO_LOADER_CACHE_FILE_NO_LOCK] = false;
$config[KernelConstants::AUTO_LOADER_UNRESOLVABLE_CACHE_ENABLED] = false;
$config[KernelConstants::AUTO_LOADER_UNRESOLVABLE_CACHE_PROVIDER] = File::class;

// ---------- Dependency injector
$config[KernelConstants::DEPENDENCY_INJECTOR_YVES] = [
    'CheckoutPage' => [
        'DummyPayment',
        NopaymentConfig::PAYMENT_PROVIDER_NAME,
    ],
];
$config[KernelConstants::DEPENDENCY_INJECTOR_ZED] = [
    'Payment' => [
        'DummyPayment',
        GiftCardConfig::PROVIDER_NAME,
        NopaymentConfig::PAYMENT_PROVIDER_NAME,
    ],
    'Oms' => [
        'DummyPayment',
        GiftCardConfig::PROVIDER_NAME,
    ],
];

$config[NopaymentConstants::NO_PAYMENT_METHODS] = [
    NopaymentConfig::PAYMENT_PROVIDER_NAME,
];
$config[NopaymentConstants::WHITELIST_PAYMENT_METHODS] = [
    GiftCardConfig::PROVIDER_NAME,
];

// ---------- State machine (OMS)
$config[OmsConstants::PROCESS_LOCATION] = [
    OmsConfig::DEFAULT_PROCESS_LOCATION,
];
$config[OmsConstants::ACTIVE_PROCESSES] = [
    'DummyPayment01',
    'Nopayment01',
];
$config[SalesConstants::PAYMENT_METHOD_STATEMACHINE_MAPPING] = [
    DummyPaymentConfig::PAYMENT_METHOD_INVOICE => 'DummyPayment01',
    DummyPaymentConfig::PAYMENT_METHOD_CREDIT_CARD => 'DummyPayment01',
    GiftCardConfig::PROVIDER_NAME => 'DummyPayment01',
    NopaymentConfig::PAYMENT_PROVIDER_NAME => 'Nopayment01',
];

// ---------- Queue
$config[QueueConstants::QUEUE_SERVER_ID] = (gethostname()) ?: php_uname('n');
$config[QueueConstants::QUEUE_WORKER_INTERVAL_MILLISECONDS] = 1000;
$config[QueueConstants::QUEUE_PROCESS_TRIGGER_INTERVAL_MICROSECONDS] = 1001;
$config[QueueConstants::QUEUE_WORKER_MAX_THRESHOLD_SECONDS] = 59;
$config[QueueConstants::QUEUE_WORKER_LOG_ACTIVE] = false;
$config[QueueConstants::QUEUE_WORKER_LOOP] = false;

/*
 * Queues can have different adapters and maximum worker number
 * QUEUE_ADAPTER_CONFIGURATION can have the array like this as an example:
 *
 *   'mailQueue' => [
 *       QueueConfig::CONFIG_QUEUE_ADAPTER => \Spryker\Client\RabbitMq\Model\RabbitMqAdapter::class,
 *       QueueConfig::CONFIG_MAX_WORKER_NUMBER => 5
 *   ],
 *
 *
 */
$config[QueueConstants::QUEUE_ADAPTER_CONFIGURATION_DEFAULT] = [
    QueueConfig::CONFIG_QUEUE_ADAPTER => RabbitMqAdapter::class,
    QueueConfig::CONFIG_MAX_WORKER_NUMBER => 1,
];

$config[QueueConstants::QUEUE_ADAPTER_CONFIGURATION] = [
    EventConstants::EVENT_QUEUE => [
        QueueConfig::CONFIG_QUEUE_ADAPTER => RabbitMqAdapter::class,
        QueueConfig::CONFIG_MAX_WORKER_NUMBER => 1,
    ],
];

$config[LogglyConstants::QUEUE_NAME] = 'loggly-log-queue';
$config[LogglyConstants::ERROR_QUEUE_NAME] = 'loggly-log-queue.error';

// ---------- Event
$config[EventConstants::EVENT_CHUNK] = 500;

// ---------- EventBehavior
$config[EventBehaviorConstants::EVENT_BEHAVIOR_TRIGGERING_ACTIVE] = true;

// ---------- Customer
$config[CustomerConstants::CUSTOMER_SECURED_PATTERN] = '(^/login_check$|^(/en|/de)?/customer($|/)|^(/en|/de)?/wishlist($|/)|^(/en|/de)?/shopping-list($|/)|^(/en|/de)?/quote-request($|/)|^(/en|/de)?/comment($|/)|^(/en|/de)?/company(?!/register)($|/)|^(/en|/de)?/multi-cart($|/)|^(/en|/de)?/shared-cart($|/)|^(/en|/de)?/cart(?!/add)($|/)|^(/en|/de)?/checkout($|/))';
$config[CustomerConstants::CUSTOMER_ANONYMOUS_PATTERN] = '^/.*';

// ---------- Taxes
$config[TaxConstants::DEFAULT_TAX_RATE] = 19;

$config[FileSystemConstants::FILESYSTEM_SERVICE] = [];
$config[FlysystemConstants::FILESYSTEM_SERVICE] = $config[FileSystemConstants::FILESYSTEM_SERVICE];
$config[CmsGuiConstants::CMS_PAGE_PREVIEW_URI] = '/en/cms/preview/%d';

// ---------- Loggly
$config[LogglyConstants::TOKEN] = 'loggly-token:sample:123456';

// ---------- CMS
$config[CmsGuiConstants::CMS_FOLDER_PATH] = '@Cms/templates/';

// ----------- Glue Application
$config[GlueApplicationConstants::GLUE_APPLICATION_DOMAIN] = '';
$config[GlueApplicationConstants::GLUE_APPLICATION_REST_DEBUG] = false;
$config[GlueApplicationConstants::GLUE_APPLICATION_CORS_ALLOW_ORIGIN] = '';

// ----------- OAUTH
//Check how to generate https://oauth2.thephpleague.com/installation/
$config[OauthConstants::PRIVATE_KEY_PATH] = 'file://';
$config[OauthConstants::PUBLIC_KEY_PATH] = 'file://';
$config[OauthConstants::ENCRYPTION_KEY] = '';
$config[OauthConstants::OAUTH_CLIENT_IDENTIFIER] = '';
$config[OauthConstants::OAUTH_CLIENT_SECRET] = '';

// ---------- FileSystem
$config[FileSystemConstants::FILESYSTEM_SERVICE] = [
    'files' => [
        'sprykerAdapterClass' => LocalFilesystemBuilderPlugin::class,
        'root' => APPLICATION_ROOT_DIR . '/data/DE/media/',
        'path' => 'files/',
    ],
];

// ---------- FileManager
$config[FileManagerConstants::STORAGE_NAME] = 'files';
$config[FileManagerGuiConstants::DEFAULT_FILE_MAX_SIZE] = '10M';

// ---------- Monitoring
$config[MonitoringConstants::IGNORABLE_TRANSACTIONS] = [
    '_profiler',
    '_wdt',
];

// ---------- Guest cart
$config[QuoteConstants::GUEST_QUOTE_LIFETIME] = 'P01M';

// ----------- Translator
$config[TranslatorConstants::TRANSLATION_ZED_FALLBACK_LOCALES] = [
    'de_DE' => ['en_US'],
];

$config[TranslatorConstants::TRANSLATION_ZED_CACHE_DIRECTORY] = sprintf(
    '%s/data/%s/cache/Zed/translation',
    APPLICATION_ROOT_DIR,
    $CURRENT_STORE
);

$config[TranslatorConstants::TRANSLATION_ZED_FILE_PATH_PATTERNS] = [
    APPLICATION_ROOT_DIR . '/data/translation/Zed/*/[a-z][a-z]_[A-Z][A-Z].csv',
];

// ----------- Yves assets
$config[ShopUiConstants::YVES_ASSETS_URL_PATTERN] = sprintf('/assets/%s/%s/', $CURRENT_STORE, '%theme%');

// ----------- Api
$config[ApiConstants::ENABLE_API_DEBUG] = false;

// ----------- Kernel test
$config[KernelConstants::ENABLE_CONTAINER_OVERRIDING] = false;

// ----------- Calculation page
$config[CalculationPageConstants::ENABLE_CART_DEBUG] = false;

// ----------- Error page
$config[ErrorPageConstants::ENABLE_ERROR_404_STACK_TRACE] = false;

// ----------- Application
$config[ApplicationConstants::TWIG_ENVIRONMENT_NAME]
    = $config[ShopApplicationConstants::TWIG_ENVIRONMENT_NAME]
    = APPLICATION_ENV;

$config[ApplicationConstants::ENABLE_PRETTY_ERROR_HANDLER] = false;

// ----------- Documentation generator
$config[DocumentationGeneratorRestApiConstants::ENABLE_REST_API_DOCUMENTATION_GENERATION] = false;
