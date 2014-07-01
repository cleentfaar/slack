<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Api\Method\Response;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
abstract class AbstractSearchApiMethodResponse extends ApiMethodResponse
{
    /**
     * @return string|null
     */
    public function getQuery()
    {
        return $this->data['query'];
    }
}
