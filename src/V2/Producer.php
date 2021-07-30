<?php


namespace Confluent\KafkaRest\V2;


use Confluent\KafkaRest\Config;
use Confluent\KafkaRest\Exception\KafkaRestException;
use Confluent\KafkaRest\Features\BaseAbstract;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\BadResponseException;

class Producer extends BaseAbstract
{
    const CONTENT_TYPE = 'application/vnd.kafka.json.v2+json';

    /**
     * @param Config $config
     * @return mixed|static
     */
    public static function instance(Config $config)
    {
        $url = $config->getUrl();
        if (!isset(self::$_instance[$url])) {
            self::$_instance[$url] = new static($config);
        }
        return self::$_instance[$url];
    }

    /**
     * Producer constructor.
     * @param Config $config
     */
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

    /**
     * @param string $topic
     * @param string $message
     * @return mixed
     * @throws GuzzleException
     * @throws KafkaRestException
     */
    public function produce(string $topic, string $message)
    {
        return $this->batchProduce($topic, [$message]);
    }

    /**
     * @param string $topic
     * @param array $messages
     * @return mixed
     * @throws GuzzleException
     * @throws KafkaRestException
     */
    public function batchProduce(string $topic, array $messages)
    {
        $uri = "/topics/{$topic}";

        $records = [];

        foreach ($messages as $message){
            $records[] = ['value' => $message];
        }

        $jsonArray = ['records' => $records];

        return $this->request('POST', $uri, $jsonArray);
    }
}