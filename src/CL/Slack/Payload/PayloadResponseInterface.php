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
 */
interface PayloadResponseInterface
{
    /**
     * @return bool True if the request was handled successfully, false otherwise
     */
    public function isOk();

    /**
     * @return string|null Any error message returned by Slack (always null if response was 'ok')
     */
    public function getError();

    /**
     * @return string|null Any error message returned by Slack, converted into a more human-readable sentence
     *                     (always null if response was 'ok')
     */
    public function getErrorExplanation();
}
