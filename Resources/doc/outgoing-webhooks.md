# Outgoing webhooks (creating your own responses)

## Creating a bot

If all you want to do is create a bot that responds to certain trigger words from Slack,
check out the example documentation for it here: [Creating a bot](creating-a-bot.md). The documentation below is more
to explain how the request is handled and how you could make your own implementations.


## Responding to an outgoing webhook

To respond to an outgoing wehook, you must first create one in the Slack Administration pages of your team.
Slack will assign a webhook-token to it which you must then add to your project's configuration.

An example webhook response would look like this:

```php
<?php

namespace Acme\App\Controller;

use Acme\MVC\Controller;
use Acme\Http\JsonResponse;
use Acme\Http\Request;
use CL\Slack\OutgoingWebhook\Request\OutgoingWebhookRequest;

class OutgoingWebhookDemoController extends Controller
{
    public function webhookAction(Request $request)
    {
        $webhookRequestFactory = new OutgoingWebhookRequestFactory();
        $webhookRequest        = $webhookRequestFactory->create($request->query->all());
        $triggerWord           = $webhookRequest->getTriggerWord();
        switch ($triggerWord) {
            case 'ask':
                $text = $this->ask($webhookRequest);
                break;
            default:
                throw new \InvalidArgumentException(sprintf('Unknown trigger-word: %s', $triggerWord));
        }

        $jsonData = [
            'text' => $text
        ];

        // return this array in json format as a response, e.g.:
        return new JsonResponse($jsonData);
    }

    public function ask(OutgoingWebhookRequest $request)
    {
        // i.e. "What is the answer to 2 + 2?"
        $question = $request->getText();
        $answer   = '4';

        return $answer;
    }
}
```

This controller contains an example of an action you could have in your project that will
get called by an outgoing webhook from Slack.

The example is about a quiz that you can start from within a channel in Slack by merely sending a
message starting with ``ask``, followed by a question like "What is the answer to 2 + 2?"

Slack would then send a request to the webhookAction, which we can then answer back to the user's channel in Slack.


### Exception handling

As long as you make sure to respond with a status code other than 200, Slack will know that something went wrong and
will behave accordingly.

To learn more about what Slack does when a outgoing webhook fails, check out their documentation:
https://<yourteamhere>.slack.com/services/new/outgoing-webhook
