## groups.close

Closes a group.

| | |
|-------------------------|-----------------------------------------------------------------------------------------------------------------------------------|
| Official documentation  | https://api.slack.com/methods/groups.close                                                                                        |
| `Payload` class         | [GroupsClosePayload](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/GroupsClosePayload.php)                 |
| `PayloadResponse` class | [GroupsClosePayloadResponse](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/GroupsClosePayloadResponse.php) |


### Usage

```php
$apiClient = new ApiClient('your-token-here');

$payload = new GroupsClosePayload();
$payload->setGroupId('G1234567');

$response = $apiClient->send($payload);

if ($response->isOk()) {
    // group has been closed!
} else {
    // something went wrong, but what?
    
    // simple error (Slack's error message)
    echo $response->getError();
    
    // explained error (Slack's explanation of the error, according to the documentation)
    echo $response->getErrorExplanation();
}
```
