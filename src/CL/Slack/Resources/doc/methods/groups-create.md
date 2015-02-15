## groups.create

Creates a new group.

| | |
|-------------------------|-------------------------------------------------------------------------------------------------------------------------------------------|
| Official documentation  | https://api.slack.com/methods/groups.create                                                                                             |
| `Payload` class         | [GroupsCreatePayload](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/GroupsCreatePayload.php)                   |
| `PayloadResponse` class | [GroupsCreatePayloadResponse](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/GroupsCreatePayloadResponse.php)   |


### Usage

```php
$payload = new GroupsCreatePayload();
$payload->setName('name-of-the-new-group-here');

$apiClient = new ApiClient('your-token-here');
$response  = $apiClient->send($payload);

if ($response->isOk()) {
    // group has been created!
} else {
    // something went wrong, but what?
    
    // simple error (Slack's error message)
    echo $response->getError();
    
    // explained error (Slack's explanation of the error, according to the documentation)
    echo $response->getErrorExplanation();
}
```
