## channels.archive

Archives a channel.

| | |
|-------------------------|----------------------------------------------------------------------------------------------------------------------|
| Official documentation  | https://api.slack.com/methods/channels.archive                                                                       |
| `Payload` class         | [ApiTestPayload](https://github.com/cleentfaar/slack/blob/master/Payload/ChannelsArchivePayload.php)                 |
| `PayloadResponse` class | [ApiTestPayloadResponse](https://github.com/cleentfaar/slack/blob/master/Payload/ChannelsArchivePayloadResponse.php) |


### Usage

```php
$payload = new ChannelsArchivePayload();
$payload->setChannelId('your-channel-id-of-choice-here');

$apiClient = new ApiClient('your-token-here');
$response  = $apiClient->send($payload);

if ($response->isOk()) {
    // channel has been archived!
} else {
    // something went wrong, but what?
    
    // simple error (Slack's error message)
    echo $response->getError();
    
    // explained error (Slack's explanation of the error, according to the documentation)
    echo $response->getErrorExplanation();
}
```
