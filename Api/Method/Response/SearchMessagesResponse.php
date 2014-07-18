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

use CL\Slack\Api\Method\Response\Representation\Message;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class SearchMessagesResponse extends AbstractSearchResponse
{
    /**
     * @return Message[] The (Slack) messages matching the search query.
     */
    public function getMessages()
    {
        return $this->data['messages'] ? $this->data['messages']['matches'] : [];
    }

    /**
     * @return int
     */
    public function getNumberOfMessages()
    {
        return $this->data['messages'] ? $this->data['messages']['total'] : 0;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureResolver(OptionsResolverInterface $resolver)
    {
        parent::configureResolver($resolver);
        $resolver->setOptional([
            'query',
            'messages',
        ]);
        $resolver->setDefaults([
            'messages' => [],
        ]);
        $resolver->setAllowedTypes([
            'query'    => ['string'],
            'messages' => ['array'],
        ]);
        $resolver->setNormalizers([
            'messages' => function (Options $options, $messages) {
                $messages['matches'] = array_map(function ($messageData) {
                    return new Message($messageData);
                }, $messages['matches']);

                return $messages;
            },
        ]);
    }
}
