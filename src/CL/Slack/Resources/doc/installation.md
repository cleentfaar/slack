## Installation

### Step 1) Get the library

First you need to get a hold of this library. There are two ways of doing this:


#### Method a) Using composer

1. Install Composer (see http://getcomposer.org/)
2. Run `$ composer require cleentfaar/slack ~0.14`
3. Jump to [step 2](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Resources/doc/installation.md#step-2-start-using-this-package).


#### Method b) Using submodules

Run the following commands to bring in the needed libraries as submodules.

```bash
git submodule add https://github.com/cleentfaar/slack.git vendor/bundles/CL/Slack
```

Add the following two namespace entries to the `registerNamespaces` call in your autoloader:

``` php
// app/autoload.php
$loader->registerNamespaces(array(
    // ...
    'CL\Slack' => __DIR__ . '/../vendor/bundles/cleentfaar/slack',
    // ...
));
```


### Step 2) Start using this package!

Check out the [usage documentation](https://github.com/cleentfaar/slack/blob/master/src/CL/Slack/Resources/doc/usage.md)!
