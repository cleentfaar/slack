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

use CL\Slack\Tests\AbstractTestCase;
use CL\Slack\Transport\ApiClient;
use CL\Slack\Transport\Payload\PayloadInterface;
use CL\Slack\Transport\Payload\Response\PayloadResponseInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Event\AbstractRequestEvent;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
abstract class AbstractLivePayloadTest extends AbstractTestCase
{
    /**
     * @var ApiClient
     */
    protected $apiClient;

    /**
     * @var string
     */
    protected $token;

    /**
     * @var PayloadInterface
     */
    protected $payload;

    /**
     * @throws \CL\Slack\Exception\SlackException
     *
     * @group live
     */
    public function testLive()
    {
        if (!getenv('CL_SLACK_LIVE_TESTING_TOKEN')) {
            $this->markTestSkipped(
                'Skipping live tests: you should copy and use phpunit_live.xml.dist.template and configure it\'s environment ' .
                'variable (CL_SLACK_LIVE_TESTING_TOKEN) with a valid Slack API token to test live results'
            );
        }

        $client = new Client();
        $client->getEmitter()->on('complete', function (AbstractRequestEvent $requestEvent) {
            sleep(2);
        });

        $this->token     = getenv('CL_SLACK_LIVE_TESTING_TOKEN');
        $this->apiClient = new ApiClient($this->token, $client);
        $this->payload   = $this->buildPayload();

        $response = $this->apiClient->send($this->payload);

        $this->assertInstanceOf('\CL\Slack\Transport\Payload\Response\PayloadResponseInterface', $response);
        $this->assertResponse($response);
    }

    /**
     * @param PayloadResponseInterface $response
     */
    abstract protected function assertResponse(PayloadResponseInterface $response);

    /**
     * @return PayloadInterface
     */
    abstract protected function buildPayload();
}
