<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Api\Method;

use CL\Slack\Api\Method\Response\SearchMessagesApiMethodResponse;
use Guzzle\Http\Message\Response;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class SearchMessagesApiMethod extends AbstractSearchApiMethod
{
    /**
     * {@inheritdoc}
     */
    public function createResponse(Response $response)
    {
        return new SearchMessagesApiMethodResponse($response);
    }

    /**
     * {@inheritdoc}
     */
    public static function getSlug()
    {
        return 'search.messages';
    }
}
