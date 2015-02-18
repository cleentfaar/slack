## channels.mark

This method moves the read cursor in a channel.

| | |
|-------------------------|-------------------------------------------------------------------------------------------------------------------------------------------|
| Official documentation  | https://api.slack.com/methods/channels.mark                                                                                               |
| `Payload` class         | [ChannelsMarkPayload](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/ChannelsMarkPayload.php)                       |
| `PayloadResponse` class | [ChannelsMarkPayloadResponse](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/ChannelsMarkPayloadResponse.php)       |


### Usage

```php
$payload = new ChannelsMarkPayload();
$payload->setChannelId('C1234567');
$payload->setSlackTimestamp('12345678.12345678'); // NOTE: not a UNIX-timestamp, Slack-specific!

$apiClient = new ApiClient('your-slack-token-here');
$response  = $apiClient->send($payload);

if ($response->isOk()) {
    // cursor has been moved successfully!
} else {
    // something went wrong, but what?
    
    // simple error (Slack's error message)
    echo $response->getError();
    
    // explained error (Slack's explanation of the error, according to the documentation)
    echo $response->getErrorExplanation();
}
```
