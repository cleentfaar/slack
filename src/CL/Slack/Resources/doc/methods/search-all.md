## search.all

This method updates a message in a channel.

| | |
|-------------------------|-------------------------------------------------------------------------------------------------------------------------------------------|
| Official documentation  | https://api.slack.com/methods/search.all                                                                                                  |
| `Payload` class         | [SearchAllPayload](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/SearchAllPayload.php)                             |
| `PayloadResponse` class | [SearchAllPayloadResponse](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/SearchAllPayloadResponse.php)             |


### Usage

```php
$apiClient = new ApiClient('your-slack-token-here');

$payload = new SearchAllPayload();
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
    $response->getFileResult()->getMatches(); // File objects
} else {
    // something went wrong, but what?
    
    // simple error (Slack's error message)
    echo $response->getError();
    
    // explained error (Slack's explanation of the error, according to the documentation)
    echo $response->getErrorExplanation();
}
```
