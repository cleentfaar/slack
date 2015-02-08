## channels.unarchive

Unarchives a channel.

| | |
|-------------------------|-------------------------------------------------------------------------------------------------------------------------------------------|
| Official documentation  | https://api.slack.com/methods/channels.unarchive                                                                                            |
| `Payload` class         | [ChannelsUnarchivePayload](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/ChannelsUnarchivePayload.php)                 |
| `PayloadResponse` class | [ChannelsUnarchivePayloadResponse](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/ChannelsUnarchivePayloadResponse.php) |


### Usage

```php
$payload = new ChannelsUnarchivePayload();
$payload->setChannelId('your-channel-id-of-choice-here');

$apiClient = new ApiClient('your-token-here');
$response  = $apiClient->send($payload);

if ($response->isOk()) {
    // channel has been unarchived!
} else {
    // something went wrong, but what?
    
    // simple error (Slack's error message)
    echo $response->getError();
    
    // explained error (Slack's explanation of the error, according to the documentation)
    echo $response->getErrorExplanation();
}
```
