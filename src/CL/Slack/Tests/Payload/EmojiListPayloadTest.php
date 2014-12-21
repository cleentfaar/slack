<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Tests\Payload;

use CL\Slack\Payload\EmojiListPayload;
use CL\Slack\Payload\PayloadInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class EmojiListPayloadTest extends AbstractPayloadTest
{
    /**
     * {@inheritdoc}
     */
    protected function createPayload()
    {
        $payload = new EmojiListPayload();

        return $payload;
    }

    /**
     * {@inheritdoc}
     *
     * @param EmojiListPayload $payload
     */
    protected function getExpectedPayloadData(PayloadInterface $payload)
    {
        return [];
    }
}
