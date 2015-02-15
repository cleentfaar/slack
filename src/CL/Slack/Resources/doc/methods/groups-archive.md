## groups.archive

Archives a group.

| | |
|-------------------------|---------------------------------------------------------------------------------------------------------------------------------------|
| Official documentation  | https://api.slack.com/methods/groups.archive                                                                                          |
| `Payload` class         | [GroupsArchivePayload](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/GroupsArchivePayload.php)                 |
| `PayloadResponse` class | [GroupsArchivePayloadResponse](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/GroupsArchivePayloadResponse.php) |


### Usage

```php
$apiClient = new ApiClient('your-token-here');

$payload = new GroupsArchivePayload();
$payload->setGroupId('G1234567');

$response = $apiClient->send($payload);

if ($response->isOk()) {
    // group has been archived!
} else {
    // something went wrong, but what?
    
    // simple error (Slack's error message)
    echo $response->getError();
    
    // explained error (Slack's explanation of the error, according to the documentation)
    echo $response->getErrorExplanation();
}
```
