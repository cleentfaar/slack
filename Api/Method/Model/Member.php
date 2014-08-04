<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Api\Method\Model;

use CL\Slack\Resolvable;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class Member extends AbstractModel
{
    /**
     * @return string The ID of this member.
     */
    public function getId()
    {
        return $this->data['id'];
    }

    /**
     * @return string The name of the channel, without a leading hash sign.
     */
    public function getName()
    {
        return $this->data['name'];
    }

    /**
     * @return string Hexadecimal colorcode used in some clients to display a colored username.
     */
    public function getColor()
    {
        return $this->data['color'];
    }

    /**
     * @return MemberProfile The profile object for this member
     */
    public function getProfile()
    {
        return $this->data['profile'];
    }

    /**
     * @return bool True if the user has been given the admin role, false otherwise.
     */
    public function isAdmin()
    {
        return $this->data['is_admin'];
    }

    /**
     * @return bool True if the user has been deactivated.
     */
    public function isDeleted()
    {
        return $this->data['deleted'];
    }

    /**
     * @return bool True if the user has added files to the Slack instance, false otherwise.
     */
    public function hasFiles()
    {
        return $this->data['has_files'];
    }

    /**
     * {@inheritdoc}
     */
    protected function configureResolver(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired([
            'id',
            'name',
            'deleted',
            'color',
            'profile',
            'is_admin',
            'is_owner',
            'has_files',
        ]);
        $resolver->setAllowedTypes([
            'id'        => ['string'],
            'name'      => ['string'],
            'deleted'   => ['bool'],
            'color'     => ['string'],
            'is_admin'  => ['bool'],
            'is_owner'  => ['bool'],
            'has_files' => ['bool'],
        ]);
    }
}
