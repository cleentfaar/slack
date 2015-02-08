## channels.history

Returns a portion of messages/events from the specified channel. To read the entire history for a channel,
don't use `setLatest()` or `setOldest()`, and then continue paging using the instructions found in the
official documentation (link below).

| | |
|-------------------------|-------------------------------------------------------------------------------------------------------------------------------------------|
| Official documentation  | https://api.slack.com/methods/channels.history                                                                                            |
| `Payload` class         | [ChannelsHistoryPayload](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/ChannelsHistoryPayload.php)                 |
| `PayloadResponse` class | [ChannelsHistoryPayloadResponse](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/ChannelsHistoryPayloadResponse.php) |


### Usage

```php
$payload = new ChannelsHistoryPayload();
$payload->setChannelId('your-channel-id-of-choice-here');

$apiClient = new ApiClient('your-token-here');
$response  = $apiClient->send($payload);

if ($response->isOk()) {
    // channel with some history
    $response->getMessages() // all messages that were posted on this channel, as an array of Message objects
    $response->getLatest() // the latest message that was posted as a Message object 
    $response->get...
} else {
    // something went wrong, but what?
    
    // simple error (Slack's error message)
    echo $response->getError();
    
    // explained error (Slack's explanation of the error, according to the documentation)
    echo $response->getErrorExplanation();
}
```
