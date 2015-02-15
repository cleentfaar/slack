## users.list

Returns a list of all users in the team. This includes deleted/deactivated users.

| | |
|-------------------------|-------------------------------------------------------------------------------------------------------------------------------------------|
| Official documentation  | https://api.slack.com/methods/users.list                                                                                                  |
| `Payload` class         | [UsersListPayload](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/UsersListPayload.php)                             |
| `PayloadResponse` class | [UsersListPayloadResponse](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/UsersListPayloadResponse.php)             |


### Usage

```php
$apiClient = new ApiClient('your-slack-token-here');
$payload   = new UsersListPayload();
$response  = $apiClient->send($payload);

if ($response->isOk()) {
    // query has been executed and result is returned (but can be empty)
    foreach ($response->getUsers() as $user) {
        echo $user->getName() // e.g. 'acme'
    }
} else {
    // something went wrong, but what?
    
    // simple error (Slack's error message)
    echo $response->getError();
    
    // explained error (Slack's explanation of the error, according to the documentation)
    echo $response->getErrorExplanation();
}
```
