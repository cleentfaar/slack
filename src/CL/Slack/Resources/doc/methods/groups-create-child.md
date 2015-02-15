## groups.createChild

Creates a new group.

| | |
|-------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------|
| Official documentation  | https://api.slack.com/methods/groups.createChild                                                                                              |
| `Payload` class         | [GroupsCreateChildPayload](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/GroupsCreateChildPayload.php)                 |
| `PayloadResponse` class | [GroupsCreateChildPayloadResponse](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/GroupsCreateChildPayloadResponse.php) |


### Usage

```php
$payload = new GroupsCreateChildPayload();
$payload->setGroupId('G1234567');

$apiClient = new ApiClient('your-token-here');
$response  = $apiClient->send($payload);

if ($response->isOk()) {
    // child has been created!
    $response->getGroup(); // the new (child) Group object
} else {
    // something went wrong, but what?
    
    // simple error (Slack's error message)
    echo $response->getError();
    
    // explained error (Slack's explanation of the error, according to the documentation)
    echo $response->getErrorExplanation();
}
```
