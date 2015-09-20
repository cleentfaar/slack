<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Serializer;

use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
abstract class AbstractSerializer
{
    /**
     * @var SerializerInterface
     */
    protected $serializer;

    final public function __construct()
    {
        $metaDir = __DIR__ . '/../Resources/config/serializer';
        $this->serializer = SerializerBuilder::create()->addMetadataDir($metaDir)->build();
    }
}
