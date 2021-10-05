<?php

echo "Hallo, dies ist ein Test";

use AmazonPHP\SellingPartner\Marketplace;
use AmazonPHP\SellingPartner\Regions;
use AmazonPHP\SellingPartner\SellingPartnerSDK;
use Buzz\Client\Curl;
use AmazonPHP\SellingPartner\Exception\ApiException;
use AmazonPHP\SellingPartner\Configuration;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Nyholm\Psr7\Factory\Psr17Factory;

require_once __DIR__ . '/vendor/autoload.php';

$factory = new Psr17Factory();
$client = new Curl($factory);

$configuration = Configuration::forIAMUser(
    'lwaClientID',
    'lwaClientID',
    'awsAccessKey',
    'awsSecretKey'
);

$logger = new Logger('name');
$logger->pushHandler(new StreamHandler(__DIR__ . '/sp-api-php.log', Logger::DEBUG));

$sdk = SellingPartnerSDK::create($client, $factory, $factory, $configuration, $logger);

$accessToken = $sdk->oAuth()->exchangeRefreshToken('seller_oauth_refresh_token');

try {
    $item = $sdk->catalogItem()->getCatalogItem(
        $accessToken,
        Regions::NORTH_AMERICA,
        $marketplaceId = Marketplace::US()->id(),
        $asin = 'B07W13KJZC'
    );
    dump($item);
} catch (ApiException $exception) {
    dump($exception->getMessage());
}