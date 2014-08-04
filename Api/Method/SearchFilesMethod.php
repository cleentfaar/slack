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

use CL\Slack\Api\Method\Response\SearchFilesResponse;

/**
 * @see https://api.slack.com/methods/search.files
 *
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class SearchFilesMethod extends AbstractSearchMethod
{
    /**
     * {@inheritdoc}
     */
    public function createResponse(array $data)
    {
        return new SearchFilesResponse($data);
    }

    /**
     * {@inheritdoc}
     */
    public static function getAlias()
    {
        return MethodFactory::METHOD_SEARCH_FILES;
    }

    /**
     * {@inheritdoc}
     */
    public static function getSlug()
    {
        return 'search.files';
    }
}
