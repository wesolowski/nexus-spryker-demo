<?php

use Spryker\Client\RabbitMq\Model\RabbitMqAdapter;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Customer\CustomerConstants;
use Spryker\Shared\Event\EventConstants;
use Spryker\Shared\GlueApplication\GlueApplicationConstants;
use Spryker\Shared\Newsletter\NewsletterConstants;
use Spryker\Shared\ProductManagement\ProductManagementConstants;
use Spryker\Shared\Queue\QueueConfig;
use Spryker\Shared\Queue\QueueConstants;
use Spryker\Shared\RabbitMq\RabbitMqEnv;
use Spryker\Shared\Session\SessionConstants;
use Spryker\Shared\ZedRequest\ZedRequestConstants;

$domain = getenv('VM_PROJECT') ?: 'suite';

// ---------- Yves host
//$config[ApplicationConstants::HOST_YVES] = sprintf('www.de.%s.local', $domain);
$config[ApplicationConstants::PORT_YVES] = '';
$config[ApplicationConstants::PORT_SSL_YVES] = '';
$config[ApplicationConstants::BASE_URL_YVES] = sprintf(
    'http://%s%s',
    $config[ApplicationConstants::HOST_YVES],
    $config[ApplicationConstants::PORT_YVES]
);
$config[ApplicationConstants::BASE_URL_SSL_YVES] = sprintf(
    'https://%s%s',
    $config[ApplicationConstants::HOST_YVES],
    $config[ApplicationConstants::PORT_SSL_YVES]
);
$config[ProductManagementConstants::BASE_URL_YVES] = $config[ApplicationConstants::BASE_URL_YVES];
$config[NewsletterConstants::BASE_URL_YVES] = $config[ApplicationConstants::BASE_URL_YVES];
$config[CustomerConstants::BASE_URL_YVES] = $config[ApplicationConstants::BASE_URL_YVES];

// ---------- Trusted hosts
$config[ApplicationConstants::YVES_TRUSTED_HOSTS] = [
    $config[ApplicationConstants::HOST_YVES],
];

// ---------- Assets / Media
$config[ApplicationConstants::BASE_URL_STATIC_ASSETS] = $config[ApplicationConstants::BASE_URL_YVES];
$config[ApplicationConstants::BASE_URL_STATIC_MEDIA] = $config[ApplicationConstants::BASE_URL_YVES];
$config[ApplicationConstants::BASE_URL_SSL_STATIC_ASSETS] = $config[ApplicationConstants::BASE_URL_SSL_YVES];
$config[ApplicationConstants::BASE_URL_SSL_STATIC_MEDIA] = $config[ApplicationConstants::BASE_URL_SSL_YVES];

// ---------- Session
$config[SessionConstants::YVES_SESSION_COOKIE_NAME] = $config[ApplicationConstants::HOST_YVES];
$config[SessionConstants::YVES_SESSION_COOKIE_DOMAIN] = $config[ApplicationConstants::HOST_YVES];
$config[SessionConstants::ZED_SESSION_COOKIE_NAME] = $config[ApplicationConstants::HOST_ZED];

// ---------- Events
$config[EventConstants::LOG_FILE_PATH] = APPLICATION_ROOT_DIR . '/data/DE/logs/application_events.log';

// ----------- Glue Application
//$config[GlueApplicationConstants::GLUE_APPLICATION_DOMAIN] = sprintf('http://glue.de.%s.local', $domain);
$config[GlueApplicationConstants::GLUE_APPLICATION_CORS_ALLOW_ORIGIN] = sprintf('http://glue.de.%s.local', $domain);

$config[QueueConstants::QUEUE_ADAPTER_CONFIGURATION_DEFAULT] = [
    QueueConfig::CONFIG_QUEUE_ADAPTER => RabbitMqAdapter::class,
    QueueConfig::CONFIG_MAX_WORKER_NUMBER => 2,
];

$config[QueueConstants::QUEUE_ADAPTER_CONFIGURATION][EventConstants::EVENT_QUEUE][QueueConfig::CONFIG_MAX_WORKER_NUMBER] = 5;

// ---------- RabbitMQ
$config[RabbitMqEnv::RABBITMQ_API_VIRTUAL_HOST] = '/DE_development_zed';
