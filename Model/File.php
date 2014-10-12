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
class File extends AbstractModel
{
    /**
     * @return string The ID of the file
     */
    public function getId()
    {
        return $this->data['id'];
    }

    /**
     * @return float The (Slack) timestamp on which the file was posted
     */
    public function getTimestamp()
    {
        return $this->data['timestamp'];
    }

    /**
     * @return string The name of the file.
     */
    public function getName()
    {
        return $this->data['name'];
    }

    /**
     * @return string|null The title that was given to the file.
     */
    public function getTitle()
    {
        return $this->data['title'];
    }

    /**
     * @return string The ID of the user that posted the file
     */
    public function getUserId()
    {
        return $this->data['user'];
    }

    /**
     * {@inheritdoc}
     */
    protected function configureResolver(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired([
            'id',
            'timestamp',
            'name',
            'title',
            'mimetype',
            'filetype',
            'pretty_type',
            'user',
            'mimetype',
            'filetype',
            'pretty_type',
            'timestamp',
            'mode',
            'editable',
            'external_type',
            'size',
            'url',
            'url_download',
            'url_private',
            'url_private_download',
            'thumb_64',
            'thumb_80',
            'thumb_360',
            'thumb_360_gif',
            'thumb_360_w',
            'thumb_360_h',
            'permalink',
            'edit_link',
            'preview',
            'preview_highlight',
            'lines',
            'lines_more',
            'is_public',
            'is_external',
            'is_starred',
            'public_url_shared',
            'channels',
            'groups',
            'initial_comment',
            'num_stars',
        ]);

        $resolver->setAllowedTypes([
            'user'        => ['string'],
            'type'        => ['string'],
            'subtype'     => ['string'],
            'text'        => ['string'],
            'num_stars'   => ['integer'],
            'is_external' => ['boolean'],
            'is_starred'  => ['boolean'],
            'is_public'   => ['boolean'],
            'timestamp'   => ['float', 'null'],
        ]);

        $resolver->setNormalizers([
            'timestamp' => function (Options $options, $ts) {
                if (!$ts) {
                    return null;
                }

                return (float) $ts;
            },
        ]);

        $resolver->setAllowedValues([
            'type' => ['message'],
        ]);
    }
}
