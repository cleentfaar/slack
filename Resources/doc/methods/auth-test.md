## auth.test

This method checks authentication and tells you who you are.

Link to official documentation: https://api.slack.com/methods/auth.test


### Usage

```php
$payload   = new AuthTestPayload();
$apiClient = new ApiClient('your-slack-token-here');
$response  = $apiClient->send($payload);

if ($response->isOk()) {
    // authentication was successful
    $response->getTeamId();
    $response->getUserId();
} else {
    // something went wrong, but what?
    
    // simple error (Slack's error message)
    echo $response->getError();
    
    // explained error (Slack's explanation of the error, according to the documentation)
    echo $response->getErrorExplanation();
}
```
