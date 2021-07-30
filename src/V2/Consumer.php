<?php


namespace Confluent\KafkaRest\V2;


use Confluent\KafkaRest\Config;
use Confluent\KafkaRest\Features\BaseAbstract;
use GuzzleHttp\Client;
use PhpParser\Node\Expr\FuncCall;

class Consumer extends BaseAbstract
{
    public static function instance(Config $config)
    {
        $url = $config->getUrl();
        if (!isset(self::$_instance[$url])) {
            self::$_instance[$url] = new static($config);
        }
        return self::$_instance[$url];
    }

    public function __construct(Config $config)
    {
        $this->httpClient = new Client(
            [
                'base_uri' => $config->getUrl(),
                'headers' => [
                    'User-Agent' => 'kafka-rest-client/1.0',
                    'Content-Type' => 'application/vnd.kafka.json.v2+json',
                    'Accept' => 'application/vnd.kafka.v2+json'
                ],
            ]
        );
    }

    public function createConsumerInstance(string $instanceId)
    {

    }

    public function destroyConsumerInstance(string $instanceId)
    {

    }

    public function createSubscription()
    {

    }

    public function destroySubscription()
    {

    }

    public function consume(string $topic)
    {

    }
}