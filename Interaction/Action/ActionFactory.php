<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Action;

use CL\Slack\Resolvable;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ActionFactory
{
    /**
     * @param array $actionData
     *
     * @return JoinAction|MessageAction
     */
    public function create(array $actionData)
    {
        if ($actionData['channel']) {
            return new JoinAction($actionData);
        } else {
            return new MessageAction($actionData);
        }
    }
}
