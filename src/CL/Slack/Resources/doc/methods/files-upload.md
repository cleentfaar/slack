## files.upload

This method allows you to create or upload an existing file.

| | |
|-------------------------|-------------------------------------------------------------------------------------------------------------------------------------------|
| Official documentation  | https://api.slack.com/methods/files.upload                                                                                          |
| `Payload` class         | [FilesUploadPayload](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/FilesUploadPayload.php)                       |
| `PayloadResponse` class | [FilesUploadPayloadResponse](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/FilesUploadPayloadResponse.php)       |


### Usage

```php
$apiClient = new ApiClient('your-slack-token-here');

$payload = new FilesUploadPayload();
$payload->setContent('fake content');
$payload->setFilename('acme_file.txt');
$payload->setFileType('text/plain');
$payload->setTitle('Acme File');
$payload->setChannels(['C1234567']);

$response = $apiClient->send($payload);

if ($response->isOk()) {
    // the user belonging to the token has joined the channel
} else {
    // something went wrong, but what?
    
    // simple error (Slack's error message)
    echo $response->getError();
    
    // explained error (Slack's explanation of the error, according to the documentation)
    echo $response->getErrorExplanation();
}
```
