<?php

namespace CL\Slack\Interaction;

use CL\Slack\Action\JoinAction;
use CL\Slack\Action\MessageAction;
use CL\Slack\Model\Member;

abstract class AbstractInteractor
{
    /**
     * @param Request $request
     *
     * @return Response
     *
     * @throws \InvalidArgumentException
     */
    public function respond(Request $request)
    {
        $action = $request->getAction();
        $member = $request->getMember();
        if ($action instanceof MessageAction) {
            return $this->respondToMessage($member, $action);
        } elseif ($action instanceof JoinAction) {
            return $this->respondToJoin($member, $action);
        }

        throw new \InvalidArgumentException(sprintf('Unknown action to respond to: %s', get_class($action)));
    }

    /**
     * @param Member        $member
     * @param MessageAction $action
     *
     * @return Response
     */
    abstract protected function respondToMessage(Member $member, MessageAction $action);

    /**
     * @param Member     $member
     * @param JoinAction $action
     *
     * @return Response
     */
    abstract protected function respondToJoin(Member $member, JoinAction $action);
}
