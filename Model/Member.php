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
     * @return string The (user)name of this member
     */
    public function getName()
    {
        return $this->data['name'];
    }

    /**
     * @return string|null The real name of the user, or null if there isn't one set
     */
    public function getRealName()
    {
        return $this->data['real_name'];
    }

    /**
     * @return string|null The skype name of the user, or null if there isn't one set
     */
    public function getSkype()
    {
        return $this->data['skype'];
    }

    /**
     * @return string|null The phone number of the user, or null if there isn't one set
     */
    public function getPhone()
    {
        return $this->data['phone'];
    }

    /**
     * @return string|null Status of the user, or null if not applicable
     */
    public function getStatus()
    {
        return $this->data['status'];
    }

    /**
     * @return string|null Hexadecimal colorcode used in some clients to display a colored username.
     */
    public function getColor()
    {
        return $this->data['color'];
    }

    /**
     * @return string|null Timezone of the user (if set), e.g. "Europe/Amsterdam", null otherwise
     */
    public function getTimezone()
    {
        return $this->data['tz'];
    }

    /**
     * @return string|null Timezone label of the user (if set), e.g. "Central European Summer Time", null otherwise
     */
    public function getTimezoneLabel()
    {
        return $this->data['tz_label'];
    }

    /**
     * @return int|null Timezone offset of the user (if set), e.g. 7200, null otherwise
     */
    public function getTimezoneOffset()
    {
        return $this->data['tz_offset'];
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
     * @return bool True if the user is a bot, false otherwise.
     */
    public function isBot()
    {
        return $this->data['is_bot'];
    }

    /**
     * @return bool True if the user has restrictions applied, false otherwise.
     */
    public function isRestricted()
    {
        return $this->data['is_restricted'];
    }

    /**
     * @return bool True if the user has ultra restrictions applied, false otherwise.
     */
    public function isUltraRestricted()
    {
        return $this->data['is_ultra_restricted'];
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
    protected function configure(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired([
            'id',
            'name',
            'deleted',
            'color',
            'profile',
            'is_admin',
            'is_owner',
            'is_bot',
            'is_primary_owner',
            'is_restricted',
            'is_ultra_restricted',
            'has_files',
            'real_name',
            'skype',
            'status',
            'phone',
            'tz',
            'tz_offset',
            'tz_label',
        ]);

        $resolver->setAllowedTypes([
            'id'                  => ['string'],
            'name'                => ['string'],
            'real_name'           => ['string', 'null'],
            'skype'               => ['string', 'null'],
            'phone'               => ['string', 'null'],
            'tz'                  => ['string', 'null'],
            'tz_label'            => ['string', 'null'],
            'tz_offset'           => ['integer', 'null'],
            'status'              => ['string', 'null'],
            'color'               => ['string', 'null'],
            'deleted'             => ['bool'],
            'is_admin'            => ['bool'],
            'is_owner'            => ['bool'],
            'is_bot'              => ['bool'],
            'is_primary_owner'    => ['bool'],
            'is_restricted'       => ['bool'],
            'is_ultra_restricted' => ['bool'],
            'has_files'           => ['bool'],
            'profile'             => ['\CL\Slack\Model\MemberProfile', 'null'],
        ]);

        $resolver->setNormalizers([
            'profile' => function (Options $options, $value) {
                if (is_array($value)) {
                    $value = new MemberProfile($value);
                }

                return $value;
            },
        ]);
    }
}
