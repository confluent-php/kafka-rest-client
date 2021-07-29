<?php


namespace Confluent\KafkaRest;


class Config
{
    private string $connection = '';
    private string $protocol = 'http';

    public function __construct(string $connection, string $protocol = 'http')
    {
        if (empty($connection)) {
            throw new \Exception('connection cannot be empty');
        }
        if($protocol !== 'http' || $protocol !== 'https'){
            throw new \Exception('protocol error');
        }
        $this->connection = $connection;
        $this->protocol = $protocol;
    }

    public function getUrl(): string
    {
        return $this->protocol . '://' . $this->connection;
    }

    public function getUrlV3(): string
    {
        return $this->getUrl() . '/v3';
    }

}