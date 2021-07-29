<?php


namespace Confluent\KafkaRest\Features;


use GuzzleHttp\Client;

abstract class ProducerAbstract
{
    protected static array $_instance = [];
    protected Client $httpClient;
}