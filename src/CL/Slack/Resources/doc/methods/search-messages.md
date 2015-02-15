## search.messages

Returns messages matching a search query.

| | |
|-------------------------|-------------------------------------------------------------------------------------------------------------------------------------------|
| Official documentation  | https://api.slack.com/methods/search.messages                                                                                                  |
| `Payload` class         | [SearchMessagesPayload](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/SearchMessagesPayload.php)                             |
| `PayloadResponse` class | [SearchMessagesPayloadResponse](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/SearchMessagesPayloadResponse.php)             |


### Usage

```php
$apiClient = new ApiClient('your-slack-token-here');

$payload = new SearchMessagesPayload();
$payload->setQuery('foo');
$payload->setPage(123);
$payload->setCount(123);
$payload->setHighlight(true);
$payload->setSort('bar');
$payload->setSortDir('asc');

$response = $apiClient->send($payload);

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
