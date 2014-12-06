# Slack [![License](https://poser.pugx.org/cleentfaar/slack/license.svg)](https://packagist.org/packages/cleentfaar/slack)

Slack API library for PHP.

**NOTE:** If your project is built on top of the Symfony Framework, consider using the bundle I created for it [here](https://github.com/cleentfaar/CLSlackBundle).
Additionally, CLI commands for all the Slack API methods can be used by installing the [SlackCliBundle](https://github.com/cleentfaar/CLSlackCliBundle).

[![Build Status](https://secure.travis-ci.org/cleentfaar/slack.svg)](http://travis-ci.org/cleentfaar/slack)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/cleentfaar/slack/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/cleentfaar/slack/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/cleentfaar/slack/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/cleentfaar/slack/?branch=master)<br/>
[![Latest Stable Version](https://poser.pugx.org/cleentfaar/slack/v/stable.svg)](https://packagist.org/packages/cleentfaar/slack)
[![Total Downloads](https://poser.pugx.org/cleentfaar/slack/downloads.svg)](https://packagist.org/packages/cleentfaar/slack)
[![Latest Unstable Version](https://poser.pugx.org/cleentfaar/slack/v/unstable.svg)](https://packagist.org/packages/cleentfaar/slack)


### Documentation

- [Getting a token](Resources/doc/getting-started.md) - Before you use this library, you need to generate a token or setup oAuth.
- [Installation](Resources/doc/installation.md) - Information on installing this library through composer or as a git submodule.
- [API methods](Resources/doc/methods/index.md) - Detailed information on each of Slack's API methods and how to access them using this library's payloads.


### Features
- Allows you to access all the Slack API methods through easy-to-use payload classes (see [usage documentation](Resources/doc/usage.md))
- `Payload` and `PayloadResponse` follow the same definition as described in the official documentation\*
- `Payload` and `PayloadResponse` classes are serialized using the [JMS Serializer](https://github.com/jms/serializer) package,
allowing for complex data to be passed while maintaining an OO-approach.
- Code has been highly abstracted to support re-use in more specific implementations (see [SlackBundle](https://github.com/cleentfaar/CLSlackBundle) and [SlackCliBundle](https://github.com/cleentfaar/CLSlackCliBundle))

** = small exceptions excluded; for example, the `channel` parameter is accessed using `getChannelId()`, not `getChannel()`*

### Further reading

I've done my best to include links to the official documentation in the code where I thought it would clarify things.
Still, you should really check out the [API documentation](https://api.slack.com/) of Slack yourself to get a better
understanding of exactly what each API method does and what data it will return.

If you feel there is some part of this package that you would like to see documented in more detail, please don't hesitate
to create an issue for it.


### FAQ

| Question                                      | Answer                                                                                                          |
|-----------------------------------------------|-----------------------------------------------------------------------------------------------------------------|
| Why isn't this package marked 'stable' yet?   | The Slack API has not reached a stable state yet, and so I cannot claim to have a stable package for it either. |


### Contributing

Got a good idea for this project? Found a nasty bug that needs fixing? That's great!
Before submitting your PR though, make sure it complies with the [contributing guide](Resources/doc/contributing.md) to
speed up the merging of your code.


### Attributions

- The [Slack](https://slack.com/) staff, for making an awesome product and very clean API documentation.
