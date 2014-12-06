<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Tests\Model;

use CL\Slack\Model\AbstractModel;
use CL\Slack\Tests\AbstractTestCase;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
abstract class AbstractModelTest extends AbstractTestCase
{
    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->serializer = SerializerBuilder::create()->build();
    }

    public function testGetters()
    {
        $modelData = $this->getModelData();

        /** @var AbstractModel $model */
        $model = $this->serializer->deserialize(
            json_encode($modelData),
            $this->getModelClass(),
            'json'
        );

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
