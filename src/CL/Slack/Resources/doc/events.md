## Events

In some scenarios, you might want to keep track of what data is passed to Slack, and what data is returned.
For this, two events have been made available that you can listen to: `EVENT_REQUEST` and `EVENT_RESPONSE`.

Below is an example of how you could use this to display debugging information to a command-line user (e.g. in a `Command`):
```php
<?php

$apiClient = new ApiClient('your-token-here');

$apiClient->addRequestListener(function (RequestEvent $event) {
    echo "Sent payload:\n";
    var_dump($event->getRawPayload()); // array containing the data that was sent to Slack
});

$apiClient->addResponseListener(function (ResponseEvent $event) use ($output, $self) {
    echo "Received payload response:\n";
    var_dump($event->getRawPayloadResponse()); // array containing the data that was returned by Slack
});

// ...

$apiClient->send($payload); // will trigger both events sequentially

```

This example is taken from the [Slack CLI](https://github.com/cleentfaar/slack-cli/blob/master/src/CL/SlackCli/Command/AbstractApiCommand.php#L266) package.
