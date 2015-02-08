## channels.info

Returns information about a team channel.

| | |
|-------------------------|-------------------------------------------------------------------------------------------------------------------------------------------|
| Official documentation  | https://api.slack.com/methods/channels.info                                                                                               |
| `Payload` class         | [ChannelsInfoPayload](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/ChannelsInfoPayload.php)                       |
| `PayloadResponse` class | [ChannelsInfoPayloadResponse](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/ChannelsInfoPayloadResponse.php)       |


### Usage

```php
$payload = new ChannelsInfoPayload();
$payload->setChannel('your-channel-id-of-choice-here');

$apiClient = new ApiClient('your-slack-token-here');
$response  = $apiClient->send($payload);

if ($response->isOk()) {
    // information has been retrieved
    $response->getChannel()->getId(); // ID of the channel
    $response->getChannel()->getName(); // name of the channel
    // $response->get...
} else {
    // something went wrong, but what?
    
    // simple error (Slack's error message)
    echo $response->getError();
    
    // explained error (Slack's explanation of the error, according to the documentation)
    echo $response->getErrorExplanation();
}
```
