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

use CL\Slack\Api\Method\Model\Message;
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
        return $this->data['messages'];
    }

    /**
     * {@inheritdoc}
     */
    protected function configureResolver(OptionsResolverInterface $resolver)
    {
        parent::configureResolver($resolver);

        $resolver->setRequired([
            'messages',
        ]);
        $resolver->setDefaults([
            'messages' => [],
        ]);
        $resolver->setAllowedTypes([
            'messages' => ['array'],
        ]);
        $resolver->setNormalizers([
            'messages' => function (Options $options, $messages) {
                return array_map(function ($messageData) {
                    return new Message($messageData);
                }, $messages['matches']);
            },
        ]);
    }
}
