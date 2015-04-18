<?php


namespace CL\Slack\Payload;


use JMS\Serializer\Serializer;

interface AdvanceSerializeInterface
{
    /**
     * Prepare date to serialize
     *
     * @param Serializer $serializer
     */
    public function beforeSerialize(Serializer $serializer);
}