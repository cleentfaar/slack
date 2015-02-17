## chat.update

This method updates a message in a channel.

| | |
|-------------------------|-------------------------------------------------------------------------------------------------------------------------------------------|
| Official documentation  | https://api.slack.com/methods/chat.update                                                                                                 |
| `Payload` class         | [ChatUpdatePayload](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/ChatUpdatePayload.php)                           |
| `PayloadResponse` class | [ChatUpdatePayloadResponse](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/ChatUpdatePayloadResponse.php)           |


### Usage

```php
$apiClient = new ApiClient('your-slack-token-here');

$payload = new ChatUpdatePayload();
$payload->setChannelId('your-channel-id-of-choice-here');
$payload->setMessage('This is the new text!');
$payload->setSlackTimestamp('12345678.12345678'); // NOTE: Slack-timestamp of the message (non-UNIX!)

$response = $apiClient->send($payload);

if ($response->isOk()) {
    // message has been updated
} else {
    // something went wrong, but what?
    
    // simple error (Slack's error message)
    echo $response->getError();
    
    // explained error (Slack's explanation of the error, according to the documentation)
    echo $response->getErrorExplanation();
}
```
