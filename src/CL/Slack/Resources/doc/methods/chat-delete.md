## chat.delete

This method deletes a message from a channel.

| | |
|-------------------------|-------------------------------------------------------------------------------------------------------------------------------------------|
| Official documentation  | https://api.slack.com/methods/chat.delete                                                                                                 |
| `Payload` class         | [ChatDeletePayload](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/ChatDeletePayload.php)                           |
| `PayloadResponse` class | [ChatDeletePayloadResponse](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/ChatDeletePayloadResponse.php)           |


### Usage

```php
$payload = new ChatDeletePayload();
$payload->setChannelId('your-channel-id-of-choice-here');
$payload->setSlackTimestamp('12345678.12345678'); // NOTE: Slack-timestamp of the message (non-UNIX!)

$apiClient = new ApiClient('your-slack-token-here');
$response  = $apiClient->send($payload);

if ($response->isOk()) {
    // message has been deleted
} else {
    // something went wrong, but what?
    
    // simple error (Slack's error message)
    echo $response->getError();
    
    // explained error (Slack's explanation of the error, according to the documentation)
    echo $response->getErrorExplanation();
}
```
