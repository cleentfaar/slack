## channels.history

This method returns a portion of messages/events from the specified channel. To read the entire history for a channel, 
call the method with no latest or oldest arguments, and then continue paging using the instructions found in the [offical documentation](https://api.slack.com/methods/channels.history).


### Usage

```php
$payload = new ChannelsHistoryPayload();
$payload->setChannel('your-channel-id-of-choice-here');

$apiClient = new ApiClient('your-slack-token-here');
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
