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

use JMS\Serializer\Annotation as Serializer;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class Customizable extends AbstractModel
{
    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $value;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $type;

    /**
     * @var \DateTime|null
     *
     * @Serializer\Type("DateTime<'U'>")
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
     * @return \DateTime|null The last date on which this customizable was customized ^_^,
     *                        or null if this was the first change
     */
    public function getLastSet()
    {
        return $this->lastSet;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->value;
    }
}
