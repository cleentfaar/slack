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

use JMS\Serializer\Annotation as Serializer;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ImChannel extends AbstractModel
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    protected $id;

    /**
     * @var \DateTime
     *
     * @Serializer\Type("DateTime<'U'>")
     */
    protected $created;

    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     */
    protected $isIm;

    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     */
    protected $isUserDeleted;

    /**
     * @return string The ID of this channel.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \DateTime The date/time on which this channel was created.
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @return boolean
     */
    public function isIsIm()
    {
        return $this->isIm;
    }

    /**
     * @return boolean
     */
    public function isIsUserDeleted()
    {
        return $this->isUserDeleted;
    }
}
