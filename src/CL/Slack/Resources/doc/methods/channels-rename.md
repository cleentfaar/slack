## channels.rename

This method moves the read cursor in a channel.

| | |
|-------------------------|-------------------------------------------------------------------------------------------------------------------------------------------|
| Official documentation  | https://api.slack.com/methods/channels.rename                                                                                             |
| `Payload` class         | [ChannelsRenamePayload](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/ChannelsRenamePayload.php)                   |
| `PayloadResponse` class | [ChannelsRenamePayloadResponse](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/ChannelsRenamePayloadResponse.php)   |


### Usage

```php
$payload = new ChannelsRenamePayload();
$payload->setChannelId('C1234567');
$payload->setName('new-name-for-this-channel');

$apiClient = new ApiClient('your-slack-token-here');
$response  = $apiClient->send($payload);

if ($response->isOk()) {
    // channel was renamed successfully!
} else {
    // something went wrong, but what?
    
    // simple error (Slack's error message)
    echo $response->getError();
    
    // explained error (Slack's explanation of the error, according to the documentation)
    echo $response->getErrorExplanation();
}
```
