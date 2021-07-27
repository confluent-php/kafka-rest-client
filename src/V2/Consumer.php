<?php


namespace Confluent\KafkaRest\V2;


use Confluent\KafkaRest\Consumer\ConsumerAbstract;

class Consumer extends ConsumerAbstract
{
    const CONTENT_TYPE = 'application/vnd.kafka.json.v2+json';
    const ACCEPT = 'application/vnd.kafka.v2+json';

    public function getTopics(){}
    public function getTopic(){}
}