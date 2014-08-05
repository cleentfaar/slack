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
use CL\Slack\Model\Message;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class SearchAllResponse extends AbstractSearchResponse
{
    /**
     * @return Message[]
     */
    public function getMessages()
    {
        return $this->data['messages'];
    }

    /**
     * @return File[]
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
            'messages',
            'files',
        ]);
        $resolver->setDefaults([
            'messages' => [],
            'files'    => [],
        ]);
        $resolver->setAllowedTypes([
            'messages' => ['array'],
            'files'    => ['array'],
        ]);
        $resolver->setNormalizers([
            'messages' => function (Options $options, $messages) {
                return array_map(function ($messageData) {
                    return new Message($messageData);
                }, $messages['matches']);
            },
            'files'    => function (Options $options, $files) {
                return array_map(function ($data) {
                    return new File($data);
                }, $files['matches']);
            },
        ]);
    }
}
