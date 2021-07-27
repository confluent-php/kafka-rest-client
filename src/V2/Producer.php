<?php


namespace Confluent\KafkaRest\V2;


use Confluent\KafkaRest\Config;
use Confluent\KafkaRest\Producer\ProducerAbstract;

class Producer extends ProducerAbstract
{
    protected static $_instance = [];
    public static function instance(Config $config) {
        $url = $config::$protocol . '://' . $config::$connection;
        if(!isset(self::$_instance[$url])){
            self::$_instance[$url] = new Producer();
        }
        return self::$_instance[$url];
    }
    public function produce($message)
    {

    }
}