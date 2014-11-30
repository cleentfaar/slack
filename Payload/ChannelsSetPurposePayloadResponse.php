<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Payload;

use JMS\Serializer\Annotation as Serializer;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ChannelsSetPurposePayloadResponse extends AbstractPayloadResponse
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $purpose;

    /**
     * @return string
     */
    public function getPurpose()
    {
        return $this->purpose;
    }

    /**
     * {@inheritdoc}
     */
    protected function getOwnErrors()
    {
        return [
            'too_long' => 'Purpose was longer than 250 characters.'
        ];
    }
}
