<?php

namespace CL\Slack\Payload;

use JMS\Serializer\Serializer;

interface AdvancedSerializeInterface
{
    /**
     * Prepare data to serialize.
     *
     * @param Serializer $serializer
     */
    public function beforeSerialize(Serializer $serializer);
}
