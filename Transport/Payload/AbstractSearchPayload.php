<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Transport\Payload;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
abstract class AbstractSearchPayload extends AbstractPayload
{
    const SORT_SCORE = 'score';
    const SORT_TIMESTAMP = 'timestamp';

    const SORT_DIR_ASC = 'asc';
    const SORT_DIR_DESC = 'desc';

    /**
     * @param string $query
     */
    public function setQuery($query)
    {
        $this->options['query'] = $query;
    }

    /**
     * @return string
     */
    public function getQuery()
    {
        return $this->options['query'];
    }

    /**
     * {@inheritdoc}
     */
    protected function getRequired()
    {
        return [
            'query'
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getOptional()
    {
        return [
            'sort',
            'sort_dir',
            'highlight',
            'count',
            'page',
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getAllowedTypes()
    {
        return [
            'query'     => ['string'],
            'sort'      => ['string'],
            'highlight' => ['string'],
            'count'     => ['integer'],
            'page'      => ['integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getAllowedValues()
    {
        return [
            'sort'      => [self::SORT_SCORE, self::SORT_TIMESTAMP],
            'sort_dir'  => [self::SORT_DIR_ASC, self::SORT_DIR_DESC],
            'highlight' => ['1', '0'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getNormalizers()
    {
        return [
            'highlight' => function ($value) {
                return $value === true ? '1' : '0';
            },
        ];
    }
}
