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

use CL\Slack\Model\File;
use CL\Slack\Resolvable;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class SearchFilesResponse extends AbstractSearchResponse
{
    /**
     * @return File[] The (Slack) files matching the search query.
     */
    public function getFiles()
    {
        return $this->data['files'];
    }

    /**
     * {@inheritdoc}
     */
    protected function configureResolver(OptionsResolverInterface $resolver)
    {
        parent::configureResolver($resolver);

        $resolver->setOptional([
            'files',
        ]);
        $resolver->setDefaults([
            'files' => [],
        ]);
        $resolver->setAllowedTypes([
            'files' => ['array'],
        ]);
        $resolver->setNormalizers([
            'files' => function (Options $options, $files) {
                return array_map(function ($data) {
                    return new File($data);
                }, $files['matches']);
            },
        ]);
    }
}
