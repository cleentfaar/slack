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

use CL\Slack\Api\Method\Response\Representation\Member;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class UsersListResponse extends Response
{
    /**
     * @return string
     */
    public function getTeam()
    {
        return $this->data['team'];
    }

    /**
     * @return string
     */
    public function getTeamId()
    {
        return $this->data['team_id'];
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->data['user'];
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->data['user_id'];
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->data['url'];
    }

    /**
     * @return Member[] Contains 1 or more members of the team, in no particular order. For deactivated users,
     *                  deleted will be true. The color field is used in some clients to display a colored username.
     */
    public function getMembers()
    {
        return $this->data['members'];
    }

    /**
     * {@inheritdoc}
     */
    protected function configureResolver(OptionsResolverInterface $resolver)
    {
        parent::configureResolver($resolver);
        $resolver->setRequired([
            'members',
        ]);
        $resolver->setNormalizers([
            'members' => function (Options $options, array $members) {
                return array_map(function ($memberData) {
                    return new Member($memberData);
                }, $members);
            },
        ]);

        return $resolver;
    }
}
