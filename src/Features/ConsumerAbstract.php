<?php


namespace Confluent\KafkaRest\Features;


use Confluent\KafkaRest\Config;

abstract class ConsumerAbstract
{
    protected static $_instance = [];

    /**
     * @param Config $config
     * @throws \Exception
     */
    public static function instance(Config $config)
    {
        if($config::$connection === ''){
            throw new \Exception('connection cannot be null');
        }
        if($config::$protocol !== 'http' || $config::$protocol !== 'https'){
            throw new \Exception('protocol error');
        }
    }
}