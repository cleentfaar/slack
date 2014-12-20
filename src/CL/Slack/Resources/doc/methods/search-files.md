## search.files

Returns files matching a search query.

Official documentation: https://api.slack.com/methods/search.files


### Usage

```php
$payload = new SearchFilesPayload();
$payload->setQuery('This is my query');

$apiClient = new ApiClient('your-slack-token-here');
$response  = $apiClient->send($payload);

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
