## emoji.list

This method lists the custom emoji for a team.

| | |
|-------------------------|-------------------------------------------------------------------------------------------------------------------------------|
| Official documentation  | https://api.slack.com/methods/emoji.list                                                                                      |
| `Payload` class         | [EmojiListPayload](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/EmojiListPayload.php)                 |
| `PayloadResponse` class | [EmojiListPayloadResponse](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/EmojiListPayloadResponse.php) |


### Usage

```php
$payload   = new EmojiListPayload();
$apiClient = new ApiClient('your-slack-token-here');
$response  = $apiClient->send($payload);

if ($response->isOk()) {
    foreach ($response->getEmoji() as $name => $urlOrAlias) {
        echo $name; // eg. 'shipit'
        echo $urlOrAlias; // eg. 'alias:squirrel'
    }
} else {
    // something went wrong, but what?
    
    // simple error (Slack's error message)
    echo $response->getError();
    
    // explained error (Slack's explanation of the error, according to the documentation)
    echo $response->getErrorExplanation();
}
```
