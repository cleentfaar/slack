<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Payload;

use CL\Slack\Model\ImChannel;
use JMS\Serializer\Annotation as Serializer;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ImListPayloadResponse extends AbstractPayloadResponse
{
    /**
     * @var ImChannel[]
     *
     * @Serializer\Type("array<CL\Slack\Model\ImChannel>")
     */
    private $channels;

    /**
     * @return ImChannel[]
     */
    public function getImChannels()
    {
        return $this->channels;
    }
}
