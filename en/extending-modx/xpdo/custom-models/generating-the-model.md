---
title: "Generating the Model"
_old_id: "1169"
_old_uri: "2.x/getting-started/creating-a-model-with-xpdo/generating-the-model-code"
---

To use your newly created XML schema, you'll need to create a PHP script that will parse the XML schema into the xPDO PHP classes and maps.

## Loading xPDOManager and xPDOGenerator

Create a PHP file where you have access to an xPDO instance. Then, let's set the Log Target to the browser, and raise it a bit to get more detailed information.

``` php 
$xpdo->setLogLevel(xPDO::LOG_LEVEL_INFO);
$xpdo->setLogTarget(XPDO_CLI_MODE ? 'ECHO' : 'HTML');
```

Now, we'll want to load the [xPDOManager](extending-modx/xpdo/class-reference/xpdomanager "xPDOManager") and [xPDOGenerator](extending-modx/xpdo/class-reference/xpdogenerator "xPDOGenerator") classes, to assist us with the model deployment.

``` php 
$manager= $xpdo->getManager();
$generator= $manager->getGenerator();
```

## Setting Class and Map Templates

Setting the Templates is completely optional. xPDO provides you with some basic templates that will work fine.

By default, xPDO provides you with default class and map templates. For the purposes of this example, however, we want to create class files and maps with PHPDoc formatting at the top, so we'll need to override the default class and map templates.

To do so, we'll just override the variables in the $generator object:

``` php 
$generator->classTemplate= <<<EOD
<?php
/**
 * [+phpdoc-package+]
 */
class [+class+] extends [+extends+] {}
?>
EOD;
$generator->platformTemplate= <<<EOD
<?php
/**
 * [+phpdoc-package+]
 */
require_once (strtr(realpath(dirname(dirname(__FILE__))), '\\\\', '/') . '/[+class-lowercase+].class.php');
class [+class+]_[+platform+] extends [+class+] {}
?>
EOD;
$generator->mapHeader= <<<EOD
<?php
/**
 * [+phpdoc-package+]
 */
EOD;
```

Note the \[phpdoc-package\] tag that we've built. This is taken from our "model" tag's attribute we defined earlier in the schema. These templates will provide us with the base for our class and map files, with PHPDoc comments.

## Generating the Files

And finally, we want to actually parse this into a file:

``` php 
$schema = '/path/to/storefinder.mysql.schema.xml';
$target = '/path/to/storefinder/model/';
$generator->parseSchema($schema,$target);
```

This block of code executes the schema parsing method, and then outputs the total time the script took to execute. Run it, and viola! Our model/ directory now has a storefinder/ subdirectory, which is filled with all of our map and class files.

## Conclusion

With the help of [xPDOGenerator](extending-modx/xpdo/class-reference/xpdogenerator "xPDOGenerator"), making your XML schema files into usable PHP classes and maps is simple. Now that we've got our PHP code, we'll proceed onto steps on [how to use it](extending-modx/xpdo/creating-objects "Using Your xPDO Model").

For an example of how to build model classes from an existing database, have a look at the following page: [Reverse Engineer xPDO Classes from Existing Database Table](extending-modx/xpdo/custom-models/generating-the-model/reverse-engineer "Reverse Engineer xPDO Classes from Existing Database Table")
