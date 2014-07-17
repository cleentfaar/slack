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

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class AuthTestResponse extends Response
{
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
        parent::configureResolver($resolver);
        $resolver->setRequired([
            'team',
            'team_id',
            'user',
            'user_id',
            'url',
        ]);
    }
}
