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

use CL\Slack\Model\Member;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class UsersListPayloadResponse extends AbstractPayloadResponse
{
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
        $resolver->setRequired([
            'members',
        ]);
        
        $resolver->setAllowedTypes([
            'members' => ['array<\CL\Slack\Model\Member>'],
        ]);
        
        $resolver->setNormalizers([
            'members' => function (Options $options, array $members) {
                return array_map(function ($memberData) {
                    return new Member($memberData);
                }, $members);
            },
        ]);
    }
}
