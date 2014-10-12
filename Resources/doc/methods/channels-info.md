## channels.info

This method returns information about a team channel.


### Usage

```php
$payload = new ChannelsInfoPayload();
$payload->setChannel('your-channel-id-of-choice-here');

$apiClient = new ApiClient('your-slack-token-here');
$response  = $apiClient->send($payload);

if ($response->isOk()) {
    // information has been retrieved
    $response->getChannel()->getId(); // ID of the channel
    $response->getChannel()->getName(); // name of the channel
    // $response->get...
} else {
    // something went wrong, but what?
    
    // simple error (Slack's error message)
    echo $response->getError();
    
    // explained error (Slack's explanation of the error, according to the documentation)
    echo $response->getErrorExplanation();
}
```
