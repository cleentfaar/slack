<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Tests\Transport\Payload;

use CL\Slack\Transport\Payload\Response\PayloadResponseInterface;
use CL\Slack\Transport\Payload\Response\UsersListPayloadResponse;
use CL\Slack\Transport\Payload\UsersListPayload;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class UsersListLivePayloadTest extends AbstractLivePayloadTest
{
    /**
     * @return UsersListPayload
     */
    public function buildPayload()
    {
        $payload = new UsersListPayload();

        return $payload;
    }

    /**
     * @param UsersListPayloadResponse|PayloadResponseInterface $response
     */
    public function assertResponse(PayloadResponseInterface $response)
    {
        $this->assertInstanceOf('\CL\Slack\Transport\Payload\Response\UsersListPayloadResponse', $response);
        $this->assertInternalType('array', $response->getMembers());

        foreach ($response->getMembers() as $member) {
            $this->assertInstanceOf('\CL\Slack\Model\Member', $member, 'Members should be instances of the correct class');
            $this->assertNotNull($member->getId());
            $this->assertNotNull($member->getName());
            if (null !== $profile = $member->getProfile()) {
                $this->assertInstanceOf('\CL\Slack\Model\MemberProfile', $profile, 'Member profiles should be instances of the correct class');
            }
        }
    }
}
