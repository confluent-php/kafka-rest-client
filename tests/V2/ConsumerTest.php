<?php
declare(strict_types=1);

namespace Confluent\KafkaRest\Tests\V2;

use PHPUnit\Framework\TestCase;
use Confluent\KafkaRest\Config;
use Confluent\KafkaRest\V2\Consumer;

class ConsumerTest extends TestCase
{
    private Consumer $consumer;

    /**
     * @throws \Exception
     */
    protected function setUp(): void
    {
        $config = new Config(getenv('REST_CONN'));
        $this->consumer = new Consumer($config);
    }

    public function testConsume(): void
    {

    }
}
