<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Tests\Serializer;

use CL\Slack\Model\Channel;
use CL\Slack\Serializer\ModelSerializer;
use CL\Slack\Tests\AbstractTestCase;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ModelSerializerTest extends AbstractTestCase
{
    /**
     * @var ModelSerializer
     */
    private $modelSerializer;

    protected function setUp()
    {
        $this->modelSerializer = new ModelSerializer();
    }

    public function testSerialize()
    {
        $model             = new Channel();
        $serializedPayload = $this->modelSerializer->serialize($model);

        $this->assertInternalType('array', $serializedPayload);
    }

    public function testDeserialize()
    {
        $modelData  = $this->createChannel();
        $modelClass = 'CL\Slack\Model\Channel';
        $model      = $this->modelSerializer->deserialize($modelData, $modelClass);

        $this->assertInstanceOf($modelClass, $model);
    }
}
