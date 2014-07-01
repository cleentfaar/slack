API method transport
====================

## Sending a message using one of the Slack API methods

```php
$apiTransport = new ApiMethodTransport('https://yourteam.slack.com/api/yourApiTokenHere');
$chatPostMessage = new ChatPostMessageApiMethod($options);
$response = $apiTransport->send($chatPostMessage);
```
