## Installation

### Step 1) Get the library

First you need to get a hold of this library. There are two ways of doing this:


#### Method a) Using composer

Add the following to your ``composer.json`` (see http://getcomposer.org/), and jump to step 3.

```json
"require" :  {
    "cleentfaar/slack": "~0.11"
}
```

#### Method b) Using submodules

Run the following commands to bring in the needed libraries as submodules.

```bash
git submodule add https://github.com/cleentfaar/slack.git vendor/bundles/CL/Slack
```


## Step 2) Register the namespaces

If you installed the bundle by composer, use the created autoload.php  (jump to step 3).
Add the following two namespace entries to the `registerNamespaces` call in your autoloader:

``` php
<?php
// app/autoload.php
$loader->registerNamespaces(array(
    // ...
    'CL\Slack' => __DIR__.'/../vendor/bundles/cleentfaar/slack',
    // ...
));
```


### Step 3) Start slacking!

Ready to become a professional slacker :smile:? Check out the [usage documentation](usage.md) or the more detailed 
[method reference](methods/index.md)!
