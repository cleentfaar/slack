## channels.list

This method is used to list the channels in your team.

| | |
|-------------------------|-------------------------------------------------------------------------------------------------------------------------------------------|
| Official documentation  | https://api.slack.com/methods/channels.list                                                                                              |
| `Payload` class         | [ChannelsListPayload](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/ChannelsListPayload.php)                     |
| `PayloadResponse` class | [ChannelsListPayloadResponse](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/ChannelsListPayloadResponse.php)     |


### Usage

```php
$payload = new ChannelsListPayload();

$apiClient = new ApiClient('your-slack-token-here');
$response  = $apiClient->send($payload);

if ($response->isOk()) {
    foreach ($response->getChannels() as $channel) {
        echo $channel->getName(); // more getters available; see class itself
    }
} else {
    // something went wrong, but what?
    
    // simple error (Slack's error message)
    echo $response->getError();
    
    // explained error (Slack's explanation of the error, according to the documentation)
    echo $response->getErrorExplanation();
}
```
