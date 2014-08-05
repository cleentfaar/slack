<?php

namespace CL\Slack\Interaction;

class Response
{
    /**
     * @return array
     */
    abstract public function toData();
}
