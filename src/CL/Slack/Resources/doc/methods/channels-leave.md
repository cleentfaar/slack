## channels.leave

This method is used to leave a channel.

| | |
|-------------------------|-------------------------------------------------------------------------------------------------------------------------------------------|
| Official documentation  | https://api.slack.com/methods/channels.leave                                                                                              |
| `Payload` class         | [ChannelsLeavePayload](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/ChannelsLeavePayload.php)                     |
| `PayloadResponse` class | [ChannelsLeavePayloadResponse](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/ChannelsLeavePayloadResponse.php)     |


### Usage

```php
$payload = new ChannelsLeavePayload();
$payload->setChannelId('C1234567');

$apiClient = new ApiClient('your-slack-token-here');
$response  = $apiClient->send($payload);

if ($response->isOk()) {
    // the user belonging to the token has left the channel
} else {
    // something went wrong, but what?
    
    // simple error (Slack's error message)
    echo $response->getError();
    
    // explained error (Slack's explanation of the error, according to the documentation)
    echo $response->getErrorExplanation();
}
```
