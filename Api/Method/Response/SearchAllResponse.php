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
use CL\Slack\Api\Method\Response\Representation\Message;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class SearchAllResponse extends AbstractSearchResponse
{
    /**
     * @return array
     */
    public function getMessages()
    {
        return $this->data['messages'] ? $this->data['messages']['matches'] : [];
    }

    /**
     * @return array
     */
    public function getFiles()
    {
        return $this->data['files'] ? $this->data['files']['matches'] : [];
    }

    /**
     * @return int
     */
    public function getNumberOfFiles()
    {
        return $this->data['files'] ? $this->data['files']['total'] : 0;
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
            'messages',
            'files',
        ]);
        $resolver->setDefaults([
            'message' => [],
            'files'   => [],
        ]);
        $resolver->setAllowedTypes([
            'messages' => ['array'],
            'files'    => ['array'],
        ]);
        $resolver->setNormalizers([
            'messages' => function (Options $options, $messages) {
                $messages['matches'] = array_map(function ($messageData) {
                    return new Message($messageData);
                }, $messages['matches']);

                return $messages;
            },
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
