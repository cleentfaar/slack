<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Payload;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 *
 * @link Official documentation at https://api.slack.com/methods/groups.create
 */
class GroupsCreatePayload extends AbstractPayload
{
    /**
     * @var string Name of group to create
     */
    private $name;

    /**
     * @param string $name Name of group to create
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string Name of group to create
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'groups.create';
    }
}
