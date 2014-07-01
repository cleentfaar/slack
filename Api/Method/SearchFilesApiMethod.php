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

use CL\Slack\Api\Method\Response\SearchFilesApiMethodResponse;
use Guzzle\Http\Message\Response;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class SearchFilesApiMethod extends AbstractSearchApiMethod
{
    /**
     * {@inheritdoc}
     */
    public function createResponse(Response $response)
    {
        return new SearchFilesApiMethodResponse($response);
    }

    /**
     * {@inheritdoc}
     */
    public static function getSlug()
    {
        return 'search.files';
    }
}
