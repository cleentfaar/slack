# Slack API access for PHP [![License](https://poser.pugx.org/cleentfaar/slack/license.svg)](https://packagist.org/packages/cleentfaar/slack)

[![Build Status](https://secure.travis-ci.org/cleentfaar/slack.svg)](http://travis-ci.org/cleentfaar/slack)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/cleentfaar/slack/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/cleentfaar/slack/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/cleentfaar/slack/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/cleentfaar/slack/?branch=master)<br/>
[![Latest Stable Version](https://poser.pugx.org/cleentfaar/slack/v/stable.svg)](https://packagist.org/packages/cleentfaar/slack)
[![Total Downloads](https://poser.pugx.org/cleentfaar/slack/downloads.svg)](https://packagist.org/packages/cleentfaar/slack)
[![Latest Unstable Version](https://poser.pugx.org/cleentfaar/slack/v/unstable.svg)](https://packagist.org/packages/cleentfaar/slack)

This package provides easy access to the Slack API using PHP [Slack API and webhooks](https://api.slack.com/).
If your project is built on top of the Symfony Framework, consider using the bundle I created for it [here](https://github.com/cleentfaar/CLSlackBundle).
It has some nice services and commands available that should make usage a breeze.


### Features
- All API methods are supported through easy to use payload classes
- All these payloads have their own tests
- Besides running against emulated results, most payloads can be tested against the live API by merely switching to a
different PHPUnit configuration file (see [contributing](Resources/doc/contributing.md) for more information).


### Documentation

[Getting started](Resources/doc/getting-started.md) - Information on installing this library, and using it through some basic examples.
[Method reference](Resources/doc/methods/index.md) - Detailed information on each of Slack's API methods and how to access them using this library.


#### Further reading

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
