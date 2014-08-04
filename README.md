# PHP library for the Slack API [![License](https://poser.pugx.org/cleentfaar/slack/license.svg)](https://packagist.org/packages/cleentfaar/slack)

[![Build Status](https://secure.travis-ci.org/cleentfaar/slack.svg)](http://travis-ci.org/cleentfaar/slack)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/cleentfaar/slack/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/cleentfaar/slack/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/cleentfaar/slack/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/cleentfaar/slack/?branch=master)<br/>
[![Latest Stable Version](https://poser.pugx.org/cleentfaar/slack/v/stable.svg)](https://packagist.org/packages/cleentfaar/slack)
[![Total Downloads](https://poser.pugx.org/cleentfaar/slack/downloads.svg)](https://packagist.org/packages/cleentfaar/slack)
[![Latest Unstable Version](https://poser.pugx.org/cleentfaar/slack/v/unstable.svg)](https://packagist.org/packages/cleentfaar/slack)

This libray provides the fundamentals for interacting with the [Slack API and webhooks](https://api.slack.com/).

**NOTE:** If your project uses the Symfony Framework, you may be better off getting the related bundle [here](https://github.com/cleentfaar/CLSlackBundle).

A few of the API methods have already been integrated, such as ``chat.postMessage`` and ``search.files``. I aim to complete the collection very soon.
Since Slack's API has not reached a stable state, the same goes for this library. Once Slack releases a v1 of their API,
I will make sure to keep the versioning tags the same as the official API.


### Now what?

Since this is only a library, the way you use it is up to you.
To get you started however, I've created some usage examples:

[Check out the examples](Resources/doc/usage.md)

To get a greater understanding of how the different classes work together, check out the more detailed documentation below:

- [Outgoing Webhooks](Resources/doc/outgoing-webhooks.md)
- [API methods](Resources/doc/api-methods.md)
- [API method transport](Resources/doc/api-method-transport.md)

Additionally, check out the [API documentation](https://api.slack.com/) of Slack itself to get a
better picture of what happens in the background.


## Contributors

- The guys at [Slack](https://slack.com/), for making an awesome product and very clean documentation.
