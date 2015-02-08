## channels.setPurpose

This method is used to change the purpose of a channel. The calling user must be a member of the channel.

| | |
|-------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------|
| Official documentation  | https://api.slack.com/methods/channels.setPurpose                                                                                               |
| `Payload` class         | [ChannelsSetPurposePayload](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/ChannelsSetPurposePayload.php)                 |
| `PayloadResponse` class | [ChannelsSetPurposePayloadResponse](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/ChannelsSetPurposePayloadResponse.php) |


### Usage

```php
$payload = new ChannelsSetPurposePayload();
$payload->setChannelId('C1234567');
$payload->setPurpose('This is the new purpose of this channel');

$apiClient = new ApiClient('your-slack-token-here');
$response  = $apiClient->send($payload);

if ($response->isOk()) {
    // purpose was set successfully!
} else {
    // something went wrong, but what?
    
    // simple error (Slack's error message)
    echo $response->getError();
    
    // explained error (Slack's explanation of the error, according to the documentation)
    echo $response->getErrorExplanation();
}
```
