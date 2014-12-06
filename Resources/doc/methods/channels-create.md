## channels.create

Creates a new channel.

Official documentation: https://api.slack.com/methods/channels.create


### Usage

```php
$payload = new ChannelsCreatePayload();
$payload->setName('name-of-the-new-channel-here');

$apiClient = new ApiClient('your-token-here');
$response  = $apiClient->send($payload);

if ($response->isOk()) {
    // channel has been created!
} else {
    // something went wrong, but what?
    
    // simple error (Slack's error message)
    echo $response->getError();
    
    // explained error (Slack's explanation of the error, according to the documentation)
    echo $response->getErrorExplanation();
}
```
