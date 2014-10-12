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
use CL\Slack\Model\MessageSearchResult;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class SearchAllPayloadResponse extends AbstractSearchPayloadResponse
{
    /**
     * @return MessageSearchResult
     */
    public function getMessageResult()
    {
        return $this->data['messages'];
    }

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
            'messages' => [],
            'files'    => [],
        ]);

        $resolver->setOptional([
            'posts',
        ]);

        $resolver->setAllowedTypes([
            'messages' => ['\CL\Slack\Model\MessageSearchResult'],
            'files'    => ['\CL\Slack\Model\FileSearchResult'],
        ]);

        $resolver->setNormalizers([
            'messages' => function (Options $options, $resultData) {
                return new MessageSearchResult($resultData);
            },
            'files'    => function (Options $options, $resultData) {
                return new FileSearchResult($resultData);
            },
        ]);
    }
}
