## Getting started

Before we start talking to the Slack API, you need to have a way of authenticating yourself. There are two ways of doing this.

### Method a) Generating a token

First, login on your Slack Team and [get yourself a token](https://api.slack.com/web).
This link takes you to the Slack API site which lets you generate an API token for your account (after logging in).
This is all you need to start working with this library.


### Method b) Use OAuth2 integration

Alternatively, you could submit your project/application to Slack and [configure OAuth authentication](https://api.slack.com/docs/oauth).
This can be useful if you have a website that will let visitors access the API with their own accounts. Code for dealing
with OAuth authentication is not included in this library as there are already plenty of good libraries for it here on GitHub.

However, if you feel you can make a decent OAuth2 extension on top of this library (specifically for connecting with Slack)
and would like to work together on this, feel free to submit an issue about it.


## Ready?

Check out the [installation documentation](installation.md)
