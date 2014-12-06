## api.test

Tests passing and receiving arguments and errors from the Slack API.

--------------------------------------------------------------------------------------------------------------------------
| Official documentation  | https://api.slack.com/methods/api.test                                                       |
| `Payload` class         | [ApiTestPayload](https://github.com/cleentfaar/slack/blob/master/Payload/ApiTestPayload.php) |
| `PayloadResponse` class | [ApiTestPayload](https://github.com/cleentfaar/slack/blob/master/Payload/ApiTestPayload.php) |


### Usage

```php
$apiClient = new ApiClient('your-slack-token-here');

$payload   = new ApiTestPayload();
$payload->addArgument('foo', 'bar');
// or...
// $payload->setError('your-error-to-test-here');

$response  = $apiClient->send($payload);

if ($response->isOk()) {
    $response->getArgument('foo'); // outputs 'bar'
    // or...
    // $response->getError(); // outputs 'your-error-to-test-here'
} else {
    // normally, this would indicate something but wrong
    // but with this method you actually test the errors you pass to them

    echo $response->getError(); // outputs 'your-error-to-test-here'
}
```
