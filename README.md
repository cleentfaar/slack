# Slack API library [![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](https://github.com/cleentfaar/slack/tree/master/LICENSE.md)

Access your Slack Team's API through PHP objects.

[![Build Status](https://img.shields.io/travis/cleentfaar/slack/master.svg?style=flat-square)](https://travis-ci.org/cleentfaar/slack)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/cleentfaar/slack.svg?style=flat-square)](https://scrutinizer-ci.com/g/cleentfaar/slack/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/cleentfaar/slack.svg?style=flat-square)](https://scrutinizer-ci.com/g/cleentfaar/slack)
[![Latest Version](https://img.shields.io/github/release/cleentfaar/slack.svg?style=flat-square)](https://github.com/cleentfaar/slack/releases)
[![Total Downloads](https://img.shields.io/packagist/dt/cleentfaar/slack.svg)](https://packagist.org/packages/cleentfaar/slack)

### Documentation

- [Getting started](https://github.com/cleentfaar/slack/tree/master/src/CL/Slack/Resources/doc/getting-started.md) - Before you use this library, you need to generate a token or setup oAuth.
- [Installation](https://github.com/cleentfaar/slack/tree/master/src/CL/Slack/Resources/doc/installation.md) - Information on installing this library through composer or as a git submodule.
- [Usage](https://github.com/cleentfaar/slack/tree/master/src/CL/Slack/Resources/doc/usage.md) - A few simple examples on how to access the Slack API using this library
- [API methods](https://github.com/cleentfaar/slack/tree/master/src/CL/Slack/Resources/doc/methods/index.md) - Detailed information on each of Slack's API methods and how to access them using this library's `Payload` classes.


### Features
- Access all of Slack's API methods with dedicated payload classes (see [usage documentation](https://github.com/cleentfaar/slack/tree/master/src/CL/Slack/Resources/doc/usage.md))
- Payloads and responses follow the same definitions as described in the [official documentation](https://api.slack.com) (with a few exceptions where I think it would make a better distinction).
- Data between you and Slack is serialized using the [JMS Serializer](https://github.com/jms/serializer) package,
allowing fully spec-ed PHP objects to be used for working with the API.
- Code has been highly abstracted to support re-use in more specific implementations (see [SlackBundle](https://github.com/cleentfaar/CLSlackBundle))


### Further reading

I've done my best to include links to the official documentation in the code where appropriate.

Still, you should really check out the [API documentation](https://api.slack.com/) of Slack yourself to get a better
understanding of exactly what each API method does and what data it will return.

If you feel there is some part of this package that you would like to see documented in more detail, please don't hesitate
to create an issue for it.


### Contributing

Got a good idea for this project? Found a nasty bug that needs fixing? That's great!
Before submitting your PR though, make sure it complies with the [contributing guide](https://github.com/cleentfaar/slack/tree/master/src/CL/Slack/Resources/doc/contributing.md) to
speed up the merging of your code.


### Related packages

- [SlackCli](https://github.com/cleentfaar/slack) - CLI application for all of the Slack API methods.
- [SlackBundle](https://github.com/cleentfaar/CLSlackBundle) - Symfony Bundle providing integration with this library package.


### Attributions

- The [Slack](https://slack.com/) staff, for making an awesome product and very clean API documentation.
