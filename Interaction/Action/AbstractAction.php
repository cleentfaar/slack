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
abstract class AbstractAction
{
    use Resolvable;

    /**
     * @var array
     */
    protected $data;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $this->resolve($data);
    }
}
