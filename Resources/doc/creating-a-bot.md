# Creating a bot

**THIS DOCUMENT IS STILL UNDER DEVELOPMENT**

So you think it would be cool to have a bot respond to certain messages from your Slack team. You may even had a look at
[configuring static responses for your Slack team](https://slack.com/customize/slackbot) but decided you wanted something
more interactive and be able talk to your own services?

Well... you've come to the right place!

In this example I will show you how you can use the Slack library to interact with Slack's OutgoingWebhooks in order to
create your own 'bot'-like service.

This example will be about creating a simple quiz that users can join in through one of your Slack channels or by typing
a specific trigger-word. The bot will ask the user to answer a question and after answering it will tell them if they
were correct.

To start off, it's important you have already configured an [outgoing webhook](https://slack.com/services/new/outgoing-webhook)
for your Slack team. On that page you will need to define the actual words a user must be typing in order for Slack to
send a request to our bot.

You could also dedicate an entire channel to a bot, so that every word typed is a trigger. For instance, you could have
a channel named ``#quiz``, and whatever messages the user sends he/she will start a new quiz.
This might come in handy if you don't feel like defining each word that a user must type, or if you don't want to
restrict the users to type specific words in order to play the quiz.

Once you have defined some trigger-words or a channel, you will need to assign a publicly available URL to the webhook,
so Slack can send it's triggers to it. So when you want to test the bot, you will need to make sure that your project's
``BotController`` or ``bot.php`` is accessible through this URL.

Of course you probably don't want any outsiders to trigger your bot. Fortunately Slack will send the token along with
every triggered request, so you can verify if the token matches with the one you generated earlier (the logic being, if
no token was passed along, or one that doesn't match, it wasn't Slack!).

All of this is explained in the code below, happy coding!


**CODE IS COMING VERY SOON!**