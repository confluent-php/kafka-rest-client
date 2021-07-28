<?php


namespace Confluent\KafkaRest\V2;


use Confluent\KafkaRest\Config;
use Confluent\KafkaRest\Features\ProducerAbstract;

class Producer extends ProducerAbstract
{

    public static function instance(Config $config) {
        self::instance($config);

        $url = $config::$protocol . '://' . $config::$connection;
        if(!isset(self::$_instance[$url])){
            self::$_instance[$url] = new Producer();
        }
        return self::$_instance[$url];
    }

    public function produce($message)
    {

    }

    public function batchProduce(array $messages)
    {

    }
}