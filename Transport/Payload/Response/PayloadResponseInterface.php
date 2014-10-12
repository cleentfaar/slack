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

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
interface PayloadResponseInterface
{
    /**
     * @param bool        $ok    True if the request was handled successfully, false otherwise
     * @param string|null $error Any error message returned by Slack (implies $ok === false)
     * @param array|null  $data  Any additional data returned by Slack, converted from JSON
     */
    public function __construct($ok = false, $error = null, array $data = null);

    /**
     * @return bool True if the request was handled successfully, false otherwise
     */
    public function isOk();

    /**
     * @return string|null Any error message returned by Slack (always null if isOk() === true)
     */
    public function getError();

    /**
     * @return array|null Any additional data returned by Slack, converted from JSON
     */
    public function getData();
}
