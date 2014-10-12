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

use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class AbstractSearchResultModel extends AbstractModel
{
    public function __construct(array $data)
    {
        parent::__construct($data);
    }

    /**
     * @return AbstractModel[]
     */
    public function getMatches()
    {
        return $this->data['matches'];
    }

    /**
     * @return int Total number of results
     */
    public function getTotal()
    {
        return $this->data['total'];
    }

    /**
     * {@inheritdoc}
     */
    protected function configureResolver(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired([
            'total',
            'matches',
        ]);

        $resolver->setOptional([
            'pagination',
            'paging',
        ]);

        $resolver->setAllowedTypes([
            'total'      => ['integer'],
            'matches'    => ['\CL\Slack\Model\SearchMessage', '\CL\Slack\Model\SearchFile'],
            'pagination' => ['\CL\Slack\Model\Paging', 'null'],
            'paging'     => ['\CL\Slack\Model\Paging', 'null'],
        ]);

        $pagingNormalizer = function (Options $options, $value) {
            if (is_array($value)) {
                $value = new Paging($value);
            }

            return $value;
        };

        $resolver->setNormalizers([
            'paging'     => $pagingNormalizer,
            'pagination' => $pagingNormalizer,
        ]);
    }
}
