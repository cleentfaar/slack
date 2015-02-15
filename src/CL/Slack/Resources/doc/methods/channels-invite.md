## channels.invite

Invites a user to a channel. The token's user must be a member of the channel.

| | |
|-------------------------|-------------------------------------------------------------------------------------------------------------------------------------------|
| Official documentation  | https://api.slack.com/methods/channels.invite                                                                                             |
| `Payload` class         | [ChannelsInvitePayload](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/ChannelsInvitePayload.php)                   |
| `PayloadResponse` class | [ChannelsInvitePayloadResponse](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/ChannelsInvitePayloadResponse.php)   |


### Usage

```php
$payload = new ChannelsInvitePayload();
$payload->setChannelId('C1234567');
$payload->setUserId('U1234567');

$apiClient = new ApiClient('your-slack-token-here');
$response  = $apiClient->send($payload);

if ($response->isOk()) {
    // user has been successfully invited!
    $response->getChannel(); // the Channel object that the user whas invited into
    $response->alreadyInChannel(); // true if the user is already in the channel (no operation done)
} else {
    // something went wrong, but what?
    
    // simple error (Slack's error message)
    echo $response->getError();
    
    // explained error (Slack's explanation of the error, according to the documentation)
    echo $response->getErrorExplanation();
}
```
