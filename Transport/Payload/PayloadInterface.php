<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Transport\Payload;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
interface PayloadInterface
{
    /**
     * @return string
     */
    public function getSlug();

    /**
     * @return array
     */
    public function create();

    /**
     * @return string
     */
    public function getResponseClass();
}
