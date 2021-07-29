<?php


namespace Confluent\KafkaRest\V2;


use Confluent\KafkaRest\Config;
use Confluent\KafkaRest\Features\ProducerAbstract;
use GuzzleHttp\Client;

class Producer extends ProducerAbstract
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
                ]
            ]
        );
    }

    public function produce(string $topic, string $message)
    {
        $uri = "/topics/{$topic}";

        $jsonArray = ['records' => [['value' => $message]]];

        $this->httpClient->post($uri, [
            'json' => $jsonArray
        ]);
    }

    public function batchProduce(string $topic, array $messages)
    {

    }
}