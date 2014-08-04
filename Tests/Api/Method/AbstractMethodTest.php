<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Tests\Api\Method;

use CL\Slack\Api\Method\MethodFactory;
use CL\Slack\Api\Method\MethodInterface;
use CL\Slack\Exception\SlackException;
use CL\Slack\Tests\AbstractTestCase;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
abstract class AbstractMethodTest extends AbstractTestCase
{
    /**
     * @var MethodFactory
     */
    protected $methodFactory;

    protected function setUp()
    {
        $this->methodFactory = new MethodFactory();
    }

    /**
     * @param array $options
     * @param bool  $throwsException
     *
     * @dataProvider getPossibleOptions
     */
    public function testConstructor(array $options, $throwsException)
    {
        $threwException = false;
        try {
            $this->createMethod($this->getMethodAlias(), $options);
        } catch (SlackException $e) {
            $threwException = true;
        }
        $this->assertEquals($throwsException, $threwException);
    }

    /**
     * @return array
     */
    abstract public function getPossibleOptions();

    /**
     * @return string
     */
    abstract public function getMethodAlias();

    /**
     * @param string $alias
     * @param array  $options
     *
     * @return MethodInterface
     */
    protected function createMethod($alias, array $options)
    {
        return $this->methodFactory->create($alias, $options);
    }
}
