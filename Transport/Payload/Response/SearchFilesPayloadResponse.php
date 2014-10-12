<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Transport\Payload\Response;

use CL\Slack\Model\FileSearchResult;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class SearchFilesPayloadResponse extends AbstractSearchPayloadResponse
{
    /**
     * @return FileSearchResult
     */
    public function getFileResult()
    {
        return $this->data['files'];
    }

    /**
     * {@inheritdoc}
     */
    protected function configureResolver(OptionsResolverInterface $resolver)
    {
        parent::configureResolver($resolver);

        $resolver->setDefaults([
            'files' => [],
        ]);

        $resolver->setAllowedTypes([
            'files' => ['\CL\Slack\Model\FileSearchResult'],
        ]);

        $resolver->setNormalizers([
            'files' => function (Options $options, $resultData) {
                if (is_array($resultData)) {
                    $resultData = new FileSearchResult($resultData);
                }

                return $resultData;
            },
        ]);
    }
}
