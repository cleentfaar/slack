<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class FileSearchResult extends AbstractSearchResultModel
{
    /**
     * @var SearchFile[]
     *
     * @Serializer\Type("array<CL\Slack\Model\SearchFile>")
     */
    private $matches;

    /**
     * @return SearchFile[]
     */
    public function getMatches()
    {
        return $this->matches;
    }
}
