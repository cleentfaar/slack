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
class GroupsOpenPayloadResponse extends AbstractPayloadResponse
{
    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     */
    private $noOp;

    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     */
    private $alreadyOpen;

    /**
     * @return boolean
     */
    public function isAlreadyOpen()
    {
        return $this->alreadyOpen;
    }

    /**
     * @return boolean
     */
    public function isNoOp()
    {
        return $this->noOp;
    }
}
