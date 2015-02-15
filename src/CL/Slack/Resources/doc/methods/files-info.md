## files.info

This method returns information about a file in your team.

| | |
|-------------------------|-------------------------------------------------------------------------------------------------------------------------------|
| Official documentation  | https://api.slack.com/methods/files.info                                                                                      |
| `Payload` class         | [FilesInfoPayload](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/FilesInfoPayload.php)                 |
| `PayloadResponse` class | [FilesInfoPayloadResponse](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/FilesInfoPayloadResponse.php) |


### Usage

```php
$apiClient = new ApiClient('your-slack-token-here');

$payload = new FilesInfoPayload();
$payload->setFile('filename');
$payload->setCount(10); // limits number of comments to fetch
$payload->setPage(123); // page number used for paging comments

$response = $apiClient->send($payload);

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
