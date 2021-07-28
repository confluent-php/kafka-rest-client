<?php


namespace Confluent\KafkaRest\V3;


use Confluent\KafkaRest\Config;
use Confluent\KafkaRest\Producer\ProducerAbstract;

class Producer extends ProducerAbstract
{
    public static function instance(Config $config) {
        self::instance($config);
        $url = $config::$protocol . '://' . $config::$connection . '/v3';
        if(!isset(self::$_instance[$url])){
            self::$_instance[$url] = new \Confluent\KafkaRest\V2\Producer();
        }
        return self::$_instance[$url];
    }
}