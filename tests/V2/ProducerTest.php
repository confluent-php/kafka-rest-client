<?php
declare(strict_types=1);

namespace Confluent\KafkaRest\Tests\V2;

use PHPUnit\Framework\TestCase;
use Confluent\KafkaRest\Config;
use Confluent\KafkaRest\V2\Producer;

class ProducerTest extends TestCase
{
    private Producer $producer;

    protected function setUp(): void
    {
        $config = new Config(getenv('REST_CONN'));
        $this->producer = new Producer($config);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Confluent\KafkaRest\Exception\KafkaRestException
     */
    public function testProduce(): void
    {
        $result = $this->producer->produce('test-topic', 'phpunit');
        self::assertIsArray($result);
        self::assertArrayHasKey('offsets', $result);
    }
}