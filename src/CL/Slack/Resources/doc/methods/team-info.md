## channels.list

This method is used to get the info for a team.

| | |
|-------------------------|---------------------------------------------------------------------------------------------------------------------------------|
| Official documentation  | https://api.slack.com/methods/team.info                                                                                         |
| `Payload` class         | [TeamInfoPayload](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/TeamInfoPayload.php)                     |
| `PayloadResponse` class | [TeamInfoPayloadResponse](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Payload/TeamInfoPayloadResponse.php)     |


### Usage

```php
$payload = new TeamInfoPayload();

$apiClient = new ApiClient('your-slack-token-here');
$response  = $apiClient->send($payload);

if ($response->isOk()) {
    $response->getTeam() // the team's info
} else {
    // something went wrong, but what?

    // simple error (Slack's error message)
    echo $response->getError();

    // explained error (Slack's explanation of the error, according to the documentation)
    echo $response->getErrorExplanation();
}
```
