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

/**
 * @author Travis Raup <info@travisraup.com>
 */
class RtmStartPayloadResponse extends AbstractPayloadResponse
{
    /**
     * @var string
     */
    private $url;

	/**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}
