<?php


namespace Confluent\KafkaRest\Features;


use Confluent\KafkaRest\Exception\KafkaRestException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\GuzzleException;

abstract class ConsumerAbstract
{
    protected static array $_instance = [];
    protected Client $httpClient;

    /**
     * @param string $method
     * @param string $uri
     * @param array $jsonArray
     * @return mixed
     * @throws GuzzleException
     * @throws KafkaRestException
     */
    protected function request(string $method, string $uri, array $jsonArray)
    {
        try {
            $result = $this->httpClient->request($method, $uri, [
                'json' => $jsonArray,
                'headers' => [
                    'Content-Type' => static::CONTENT_TYPE
                ]
            ]);

            $contents = $result->getBody()->getContents();
            return json_decode($contents, true, 512, JSON_THROW_ON_ERROR);

        } catch (BadResponseException $e) {
            $contents = $e->getResponse()->getBody()->getContents();
            $exception = json_decode($contents);
            throw new KafkaRestException($exception['message'], $exception['error_code']);
        }catch (\JsonException $jsonException) {
            throw new KafkaRestException('解析KafkaRest服务器响应出错，请检查服务器状态');
        }
    }
}