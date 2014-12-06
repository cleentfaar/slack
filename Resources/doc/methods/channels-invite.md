## channels.invite

Returns information about a team channel.

Official documentation: https://api.slack.com/methods/channels.invite


### Usage

```php
$payload = new ChannelsInvitePayload();
$payload->setChannelId('C1234567');
$payload->setUserId('U1234567');

$apiClient = new ApiClient('your-slack-token-here');
$response  = $apiClient->send($payload);

if ($response->isOk()) {
    // user has been successfully invited!
} else {
    // something went wrong, but what?
    
    // simple error (Slack's error message)
    echo $response->getError();
    
    // explained error (Slack's explanation of the error, according to the documentation)
    echo $response->getErrorExplanation();
}
```
