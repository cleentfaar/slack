<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Tests\Model;

use CL\Slack\Model\AbstractModel;
use CL\Slack\Tests\AbstractTestCase;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
abstract class AbstractModelTest extends AbstractTestCase
{
    /**
     * @var Serializer
     */
    protected $serializer;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $metaDir = __DIR__ . '/../../../../../../src/CL/Slack/Resources/config/serializer';
        $this->serializer = SerializerBuilder::create()->addMetadataDir($metaDir)->build();
    }

    /**
     * @test
     */
    public function it_can_be_deserialized()
    {
        $modelData = $this->getModelData();
        $modelClass = $this->getModelClass();

        /** @var AbstractModel $model */
        $model = $this->serializer->deserialize(
            json_encode($modelData),
            $modelClass,
            'json'
        );

        $this->assertInstanceOf($modelClass, $model);
        $this->assertInstanceOf('CL\Slack\Model\AbstractModel', $model);

        $this->assertModel($modelData, $model);
    }

    /**
     * @return array
     */
    abstract protected function getModelData();

    /**
     * @return string
     */
    abstract protected function getModelClass();

    /**
     * @param array         $expectedModelData
     * @param AbstractModel $actualModel
     */
    abstract protected function assertModel(array $expectedModelData, AbstractModel $actualModel);
}
