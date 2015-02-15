## groups.history

Returns a portion of messages/events from the specified group. To read the entire history for a group,
don't use `setLatest()` or `setOldest()`, and then continue paging using the instructions found in the
official documentation (link below).

| | |
|-------------------------|---------------------------------------------------------------------------------------------------------------------------------------|
| Official documentation  | https://api.slack.com/methods/groups.history                                                                                          |
| `Payload` class         | [GroupsHistoryPayload](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/GroupsHistoryPayload.php)                 |
| `PayloadResponse` class | [GroupsHistoryPayloadResponse](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/GroupsHistoryPayloadResponse.php) |


### Usage

```php
$payload = new GroupsHistoryPayload();
$payload->setGroupId('your-group-id-of-choice-here');

$apiClient = new ApiClient('your-token-here');
$response  = $apiClient->send($payload);

if ($response->isOk()) {
    // group with some history
    $response->getMessages() // all messages that were posted on this group, as an array of Message objects
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
