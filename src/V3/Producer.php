<?php


namespace Confluent\KafkaRest\V3;


use Confluent\KafkaRest\Config;
use Confluent\KafkaRest\Features\ProducerAbstract;
use GuzzleHttp\Client;

class Producer extends ProducerAbstract
{
    const CONTENT_TYPE = 'application/json';

    public static function instance(Config $config)
    {
        $url = $config->getUrlV3();
        if (!isset(self::$_instance[$url])) {
            self::$_instance[$url] = new static($config);
        }
        return self::$_instance[$url];
    }

    public function __construct(Config $config)
    {
        $this->httpClient = new Client(
            [
                'base_uri' => $config->getUrlV3(),
            ]
        );
    }
}