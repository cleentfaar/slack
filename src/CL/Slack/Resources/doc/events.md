## Events

In some scenarios, you might want to keep track of what data is passed to Slack, and what data is returned.
For this, two events have been made available that you can listen to: `EVENT_REQUEST` and `EVENT_RESPONSE`.

Below is an example of how you could use this to display debugging information to a command-line user (e.g. in a `Command`):
```php
<?php

$apiClient = new ApiClient('your-token-here');

$apiClient->addListener(
    ApiClient::EVENT_REQUEST,
    function (RequestEvent $event) use ($output, $self) {
        $self->rawRequest = $event->getRawPayload();
        if ($output->getVerbosity() > OutputInterface::VERBOSITY_VERBOSE) {
            $output->writeln('<comment>Debug: sending payload...</comment>');
            $this->renderKeyValueTable($output, $self->rawRequest); // some method to display the array of data
        }
    }
);

$apiClient->addListener(
    ApiClient::EVENT_RESPONSE,
    function (ResponseEvent $event) use ($output, $self) {
        $self->rawResponse = $event->getRawPayloadResponse();
        if ($output->getVerbosity() > OutputInterface::VERBOSITY_VERBOSE) {
            $output->writeln('<comment>Debug: received payload response...</comment>');
            $this->renderKeyValueTable($output, $self->rawResponse); // some method to display the array of data
        }
    }
);

// ...

$apiClient->send($payload); // will trigger both events sequentially

```

This example is taken from the [Slack CLI](https://github.com/cleentfaar/slack-cli/blob/master/src/CL/SlackCli/Command/AbstractApiCommand.php#L266) package.
