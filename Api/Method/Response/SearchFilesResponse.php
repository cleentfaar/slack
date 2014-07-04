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

use CL\Slack\Api\Method\Response\Representation\File;
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
     * @return int
     */
    public function getNumberOfFiles()
    {
        return $this->data['files'] ? $this->data['files']['total'] : 0;
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
            'files' => [
                'total' => 0,
            ],
        ]);
        $resolver->setAllowedTypes([
            'files' => ['array'],
        ]);
        $resolver->setNormalizers([
            'files' => function (Options $options, $files) {
                $files['matches'] =  array_map(function ($data) {
                    return new File($data);
                }, $files['matches']);

                return $files;
            },
        ]);

        return $resolver;
    }
}
