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

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class AuthTestPayloadResponse extends AbstractPayloadResponse
{
    /**
     * @return string
     */
    public function getUsername()
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
    public function getUrl()
    {
        return $this->data['url'];
    }

    /**
     * {@inheritdoc}
     */
    protected function configureResolver(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired([
            'user',
            'user_id',
            'team',
            'team_id',
            'url',
        ]);

        $resolver->setAllowedTypes([
            'user'    => ['string'],
            'user_id' => ['string'],
            'team'    => ['string'],
            'team_id' => ['string'],
            'url'     => ['string'],
        ]);
    }
}
