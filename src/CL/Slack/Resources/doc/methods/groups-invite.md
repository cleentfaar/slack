## groups.invite

Invites a user to a group. The token's user must be a member of the group.

| | |
|-------------------------|-------------------------------------------------------------------------------------------------------------------------------------------|
| Official documentation  | https://api.slack.com/methods/groups.invite                                                                                             |
| `Payload` class         | [GroupsInvitePayload](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/GroupsInvitePayload.php)                   |
| `PayloadResponse` class | [GroupsInvitePayloadResponse](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/GroupsInvitePayloadResponse.php)   |


### Usage

```php
$payload = new GroupsInvitePayload();
$payload->setGroupId('C1234567');
$payload->setUserId('U1234567');

$apiClient = new ApiClient('your-slack-token-here');
$response  = $apiClient->send($payload);

if ($response->isOk()) {
    // user has been successfully invited!
    $response->getGroup(); // the Group object that the user whas invited into
    $response->alreadyInGroup(); // true if the user is already in the group (no operation done)
} else {
    // something went wrong, but what?
    
    // simple error (Slack's error message)
    echo $response->getError();
    
    // explained error (Slack's explanation of the error, according to the documentation)
    echo $response->getErrorExplanation();
}
```
