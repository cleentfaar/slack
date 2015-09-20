## channels.join

Joins a user to a channel. The token's user must be a member of the channel.

| | |
|-------------------------|-------------------------------------------------------------------------------------------------------------------------------------------|
| Official documentation  | https://api.slack.com/methods/channels.join                                                                                               |
| `Payload` class         | [ChannelsJoinPayload](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/ChannelsJoinPayload.php)                       |
| `PayloadResponse` class | [ChannelsJoinPayloadResponse](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/ChannelsJoinPayloadResponse.php)       |


### Usage

```php
$payload = new ChannelsJoinPayload();
$payload->setName('#general');

$apiClient = new ApiClient('your-slack-token-here');
$response  = $apiClient->send($payload);

if ($response->isOk()) {
    // the user belonging to the token has joined the channel
} else {
    // something went wrong, but what?
    
    // simple error (Slack's error message)
    echo $response->getError();
    
    // explained error (Slack's explanation of the error, according to the documentation)
    echo $response->getErrorExplanation();
}
```
