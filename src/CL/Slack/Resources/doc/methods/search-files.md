## search.files

This method allows to to search both messages and files in a single call.

| | |
|-------------------------|-------------------------------------------------------------------------------------------------------------------------------------------|
| Official documentation  | https://api.slack.com/methods/search.files                                                                                                  |
| `Payload` class         | [SearchFilesPayload](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/SearchFilesPayload.php)                             |
| `PayloadResponse` class | [SearchFilesPayloadResponse](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/SearchFilesPayloadResponse.php)             |


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
