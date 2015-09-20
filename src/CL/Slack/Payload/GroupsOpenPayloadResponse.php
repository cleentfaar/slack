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
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class GroupsOpenPayloadResponse extends AbstractPayloadResponse
{
    /**
     * @var bool
     */
    private $noOp;

    /**
     * @var bool
     */
    private $alreadyOpen;

    /**
     * @return bool
     */
    public function isAlreadyOpen()
    {
        return $this->alreadyOpen;
    }

    /**
     * @return bool
     */
    public function isNoOp()
    {
        return $this->noOp;
    }
}
