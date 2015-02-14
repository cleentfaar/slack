<?php

namespace CL\Slack\Payload;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
abstract class AbstractPayloadResponse implements PayloadResponseInterface
{
    /**
     * @var bool
     */
    private $ok;

    /**
     * @var string
     */
    private $error;

    /**
     * {@inheritdoc}
     */
    public function isOk()
    {
        return (bool) $this->ok;
    }

    /**
     * {@inheritdoc}
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * {@inheritdoc}
     */
    public function getErrorExplanation()
    {
        if (null === $error = $this->getError()) {
            return null;
        }

        $ownErrors = $this->getOwnErrors();
        if (array_key_exists($error, $ownErrors)) {
            return $ownErrors[$error];
        }

        return PayloadResponseErrors::explain($error);
    }

    /**
     * @return array
     */
    protected function getOwnErrors()
    {
        return [];
    }
}
