<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\OutgoingWebhook\Request;

use Symfony\Component\HttpFoundation\Request;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class OutgoingWebhookRequestFactory
{
    /**
     * @var array|null
     */
    protected $outgoingWebhooks;

    /**
     * @param array|null $outgoingWebhooks
     */
    public function __construct(array $outgoingWebhooks = null)
    {
        $this->outgoingWebhooks = $outgoingWebhooks;
    }

    /**
     * @param string $triggerWord
     * @param string $token
     *
     * @return bool
     */
    public function hasOutgoingWebhookToken($triggerWord, $token)
    {
        if (array_key_exists($triggerWord, $this->outgoingWebhooks) && $this->outgoingWebhooks[$triggerWord]['token'] === $token) {
            return true;
        }

        return false;
    }

    /**
     * @param array $options
     *
     * @return OutgoingWebhookRequest
     *
     * @throws \InvalidArgumentException
     */
    public function create(array $options)
    {
        $outgoingWebhookRequest = new OutgoingWebhookRequest($options);
        $token                  = $outgoingWebhookRequest->getToken();
        $triggerWord            = $outgoingWebhookRequest->getTriggerWord();
        if (!$this->hasOutgoingWebhookToken($triggerWord, $token)) {
            throw new \InvalidArgumentException(sprintf("There is no outgoing webhook assigned with that trigger-word (%s) and token combination (%s)", $triggerWord, $token));
        }

        return $outgoingWebhookRequest;
    }
}
