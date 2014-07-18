Using the CLSlack library
=========================

## Sending a message to a Slack channel

API calls can be done either by constructing the appropriate ``ApiMethod``-class or by using the ``ApiMethodFactory``
and passing it the necessary options.

With the ``MethodFactory`` class:
```php
$apiTransport = new Transport('https://yourteam.slack.com/api/yourApiTokenHere');
$options = array(
    'channel' => '#general',
    'text'    => 'This is my message'
));
$chatPostMessage = MethodFactory::create(MethodFactory::METHOD_CHAT_POSTMESSAGE, $options));

$response = $apiTransport->send($chatPostMessage);
$response->getTimestamp(); // the Slack timestamp on which the message was posted
```

Without the ``MethodFactory`` class:
```php
$apiTransport = new Transport('https://yourteam.slack.com/api/yourApiTokenHere');
$options = array(
    'channel' => '#general',
    'text'    => 'This is my message'
)
$chatPostMessage = new ChatPostMessageMethod($options);

$response = $apiTransport->send($chatPostMessage);
$response->getTimestamp(); // the Slack timestamp on which the message was posted
```


## Outgoing webhooks

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

## About outgoing webhooks

More information about outgoing webhooks can be found in the [outgoing webhooks documentation](outgoing-webhooks.md)
