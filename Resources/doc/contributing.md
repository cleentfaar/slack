# Contributing


## Coding standards

Your code should follow [Symfony's coding standards](http://symfony.com/doc/current/contributing/code/standards.html) as close as possible.


## Conventions

Your code should follow [Symfony's code conventions](http://symfony.com/doc/current/contributing/code/conventions.html) as close as possible.


## Testing your code locally

Please make sure the unit tests run without failures before and after contributing. To do this, simply run your tests 
using the phpunit version bundled with the library, like this:

    ./bin/phpunit Tests/Path/To/Your/Test.php


## (Optional) testing your code in production using your own Slack API token

Although you would rarely want to do this, it could be useful to run tests directly against the Slack API
to ensure the code you produced works on a live environment. A few steps need to be taken to make this happen:

1. Copy the `phpunit_live.xml.dist.template` file found in the root of this package, and rename the copied file to
`phpunit_live.xml.dist` (removing `.template`).
2. Fix the `value`-attributes inside the copied file to those of your own as indicated by the comments:
```xml
<phpunit>
    <!-- ... -->
    <php>
        <!-- Set this to enable live tests. A token can be generated at https://api.slack.com/#auth (requires log-in) -->
        <env name="CL_SLACK_LIVE_TESTING_TOKEN" value="YOUR_SLACK_API_TOKEN_HERE"/>

        <!-- The #general channel ID can be found at https://api.slack.com/methods/channels.info/test#api-arg-extras-2 (click on #general) (requires login) -->
        <env name="CL_SLACK_LIVE_TESTING_GENERAL_CHANNEL_ID" value="YOUR_SLACK_GENERAL_CHANNEL_ID_HERE"/>
    </php>
    <!-- ... -->
</phpunit>
```
3. That's it, from now on you can run live tests by running:

    `./bin/phpunit -c phpunit_live.xml.dist Tests/Path/To/Your/Test.php`
