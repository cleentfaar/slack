## channels.kick

This method allows a user to remove another member from a team channel.

| | |
|-------------------------|-------------------------------------------------------------------------------------------------------------------------------------------|
| Official documentation  | https://api.slack.com/methods/channels.kick                                                                                               |
| `Payload` class         | [ChannelsKickPayload](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/ChannelsKickPayload.php)                       |
| `PayloadResponse` class | [ChannelsKickPayloadResponse](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/ChannelsKickPayloadResponse.php)       |


### Usage

```php
$payload = new ChannelsInvitePayload();
$payload->setChannelId('C1234567');
$payload->setUserId('U1234567');

$apiClient = new ApiClient('your-slack-token-here');
$response  = $apiClient->send($payload);

if ($response->isOk()) {
    // user has been successfully invited!
} else {
    // something went wrong, but what?
    
    // simple error (Slack's error message)
    echo $response->getError();
    
    // explained error (Slack's explanation of the error, according to the documentation)
    echo $response->getErrorExplanation();
}
```
