## search.files

This method allows to to search both messages and files in a single call.

| | |
|-------------------------|-------------------------------------------------------------------------------------------------------------------------------------------|
| Official documentation  | https://api.slack.com/methods/search.files                                                                                                  |
| `Payload` class         | [SearchFilesPayload](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/SearchFilesPayload.php)                             |
| `PayloadResponse` class | [SearchFilesPayloadResponse](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/SearchFilesPayloadResponse.php)             |


### Usage

```php
$apiClient = new ApiClient('your-slack-token-here');

$payload = new SearchFilesPayload();
$payload->setQuery('foo');
$payload->setPage(123);
$payload->setCount(123);
$payload->setHighlight(true);
$payload->setSort('bar');
$payload->setSortDir('asc');

$response = $apiClient->send($payload);

if ($response->isOk()) {
    // query has been executed and result is returned (but can be empty)
    $response->getFileResult()->getMatches(); // File objects
} else {
    // something went wrong, but what?
    
    // simple error (Slack's error message)
    echo $response->getError();
    
    // explained error (Slack's explanation of the error, according to the documentation)
    echo $response->getErrorExplanation();
}
```
