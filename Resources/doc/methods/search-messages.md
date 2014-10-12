## search.messages

This method returns messages matching a search query.


### Usage

```php
$payload = new SearchMessagesPayload();
$payload->setQuery('This is my query');

$apiClient = new ApiClient('your-slack-token-here');
$response  = $apiClient->send($payload);

if ($response->isOk()) {
    // query has been executed and result is returned (but can be empty)
    $response->getMessageResult()->getMatches(); // Message objects
} else {
    // something went wrong, but what?
    
    // simple error (Slack's error message)
    echo $response->getError();
    
    // explained error (Slack's explanation of the error, according to the documentation)
    echo $response->getErrorExplanation();
}
```
