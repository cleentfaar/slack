## files.list

This method is used to list files in your team.

| | |
|-------------------------|-------------------------------------------------------------------------------------------------------------------------------|
| Official documentation  | https://api.slack.com/methods/files.list                                                                                      |
| `Payload` class         | [FilesListPayload](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/FilesListPayload.php)                 |
| `PayloadResponse` class | [FilesListPayloadResponse](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/FilesListPayloadResponse.php) |


### Usage

```php
$apiClient = new ApiClient('your-slack-token-here');
$payload   = new FilesListPayload();
$response  = $apiClient->send($payload);

if ($response->isOk()) {
    foreach ($response->getFiles() as $file) {
        echo $file->getName(); // more getters available, see: CL\Slack\Model\File
    }
} else {
    // something went wrong, but what?
    
    // simple error (Slack's error message)
    echo $response->getError();
    
    // explained error (Slack's explanation of the error, according to the documentation)
    echo $response->getErrorExplanation();
}
```
