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

use CL\Slack\Model\MessageSearchResult;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class SearchMessagesPayloadResponse extends AbstractSearchPayloadResponse
{
    /**
     * @return MessageSearchResult
     */
    public function getMessageResult()
    {
        return $this->data['messages'];
    }

    /**
     * {@inheritdoc}
     */
    protected function configureResolver(OptionsResolverInterface $resolver)
    {
        parent::configureResolver($resolver);

        $resolver->setDefaults([
            'messages' => [],
        ]);

        $resolver->setAllowedTypes([
            'messages' => ['\CL\Slack\Model\MessageSearchResult'],
        ]);

        $resolver->setNormalizers([
            'messages' => function (Options $options, $resultData) {
                if (is_array($resultData)) {
                    $resultData = new MessageSearchResult($resultData);
                }
                
                return $resultData;
            },
        ]);
    }
}
