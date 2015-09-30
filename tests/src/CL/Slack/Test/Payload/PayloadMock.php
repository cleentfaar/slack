<?php

namespace CL\Slack\Test\Payload;

use CL\Slack\Payload\PayloadInterface;

class PayloadMock implements PayloadInterface
{
    /**
     * @var string
     */
    private $fruit;

    /**
     * @param string $fruit
     */
    public function setFruit($fruit)
    {
        $this->fruit = $fruit;
    }

    /**
     * @return string
     */
    public function getFruit()
    {
        return $this->fruit;
    }

    /**
     * @inheritdoc
     */
    public function getMethod()
    {
        return 'mock';
    }

    /**
     * @inheritdoc
     */
    public function getResponseClass()
    {
        return MockPayloadResponse::class;
    }
}
