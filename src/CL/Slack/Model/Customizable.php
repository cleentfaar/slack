<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Model;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 *
 * @link Official documentation at https://api.slack.com/types/channel
 */
class Customizable extends AbstractModel
{
    /**
     * @var string|null
     */
    private $value;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var string|null
     */
    private $creator;

    /**
     * @var \DateTime|null
     */
    private $lastSet;

    /**
     * @return string The value of this customizable
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string|null
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * Returns the last date on which this customizable was customized ^_^,
     * or null if this was the first change.
     *
     * @return \DateTime|null
     */
    public function getLastSet()
    {
        return $this->lastSet;
    }
}
