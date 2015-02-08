## channels.setTopic

This method is used to change the topic of a channel. The calling user must be a member of the channel.

| | |
|-------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------|
| Official documentation  | https://api.slack.com/methods/channels.setTopic                                                                                               |
| `Payload` class         | [ChannelsSetTopicPayload](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/ChannelsSetTopicPayload.php)                 |
| `PayloadResponse` class | [ChannelsSetTopicPayloadResponse](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/ChannelsSetTopicPayloadResponse.php) |


### Usage

```php
$payload = new ChannelsSetTopicPayload();
$payload->setChannelId('C1234567');
$payload->setTopic('This is the new topic of this channel');

$apiClient = new ApiClient('your-slack-token-here');
$response  = $apiClient->send($payload);

if ($response->isOk()) {
    // topic was set successfully!
} else {
    // something went wrong, but what?
    
    // simple error (Slack's error message)
    echo $response->getError();
    
    // explained error (Slack's explanation of the error, according to the documentation)
    echo $response->getErrorExplanation();
}
```
