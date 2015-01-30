## auth.test

Checks authentication and tells you more about token's user.

| | |
|-------------------------|----------------------------------------------------------------------------------------------------------------|
| Official documentation  | https://api.slack.com/methods/auth.test                                                                        |
| `Payload` class         | [AuthTestPayload](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/AuthTestPayload.php)                 |
| `PayloadResponse` class | [AuthTestPayloadResponse](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/AuthTestPayloadResponse.php) |


### Usage

```php
$apiClient = new ApiClient('your-slack-token-here');
$payload   = new AuthTestPayload();
$response  = $apiClient->send($payload);

if ($response->isOk()) {
    // authentication was successful
    $response->getTeam();
    $response->getTeamId();
    $response->getUsername();
    $response->getUserId();
} else {
    // something went wrong, but what?
    
    // simple error (Slack's error message)
    echo $response->getError();
    
    // explained error (Slack's explanation of the error, according to the documentation)
    echo $response->getErrorExplanation();
}
```
