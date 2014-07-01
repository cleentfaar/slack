Using the CLSlack library
=========================

# API Method example: sending a message to a Slack channel

API calls can be done either by constructing the appropriate ``ApiMethod``-class or by using the ``ApiMethodFactory``
and passing it the necessary options.

```php
$chatPostMessage = new ChatPostMessageApiMethod($options);
// ...
$response = $apiTransport->send($chatPostMessage);
```

Check out the [API method transport documentation](api-method-transport.md) for more information about sending methods.


# Outgoing webhooks

Outgoing Webhooks (triggered by trigger-words in Slack) can be responded to by using the ``ApiMethodRequestFactory``
and passing it the incoming request. You can then choose how to respond to them as illustrated below.

```php
$webhooks = [
    // ...
    'foo' => [
        'trigger_words' => ['foo', 'bot'],
        'token' => 'AbCde1f2ghijKlMNOpq345Rs',
    ],
    // ...
];
$requestFactory = new OutgoingWebhookRequestFactory($webhooks);
$request = $requestFactory->create($request->query->all()); // incoming Slack request query
switch ($request->getTriggerWord()) {
    case 'foo':
        // do something 'foo'-like...
        return $response; // send it...
        break;
    case 'bot':
        // do something 'bot'-like...
        return $response; // send it...
        break;
}
```
