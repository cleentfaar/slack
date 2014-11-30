## chat.postMessage

This method posts a message to a channel.

Link to official documentation: https://api.slack.com/methods/chat.postMessage


### Usage

```php
$payload = new ChatPostMessagePayload();
$payload->setChannel('#general');
$payload->setMessage('Hello world!');

$apiClient = new ApiClient('your-slack-token-here');
$response  = $apiClient->send($payload);

if ($response->isOk()) {
    // message has been posted
} else {
    // something went wrong, but what?
    
    // simple error (Slack's error message)
    echo $response->getError();
    
    // explained error (Slack's explanation of the error, according to the documentation)
    echo $response->getErrorExplanation();
}
```
