## chat.postMessage

This method posts a message to a channel.

| | |
|-------------------------|-------------------------------------------------------------------------------------------------------------------------------------------|
| Official documentation  | https://api.slack.com/methods/chat.postMessage                                                                                            |
| `Payload` class         | [ChannelsArchivePayload](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/ChatPostMessagePayload.php)                 |
| `PayloadResponse` class | [ChannelsArchivePayloadResponse](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/ChatPostMessagePayloadResponse.php) |


### Usage

```php
$apiClient = new ApiClient('your-slack-token-here');

$payload = new ChatPostMessagePayload();
$payload->setChannel('#general');
$payload->setMessage('Hello world!');

$response = $apiClient->send($payload);

if ($response->isOk()) {
    // message has been posted
} else {
    // something went wrong, but what?
    
    // simple error (Slack's error message)
    echo $response->getError();
    
    // explained error (Slack's explanation of the error, according to the documentation)
    echo $response->getErrorExplanation();
}
```
