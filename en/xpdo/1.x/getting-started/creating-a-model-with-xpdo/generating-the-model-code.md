---
title: "Generating the Model Code"
_old_id: "1519"
_old_uri: "1.x/getting-started/creating-a-model-with-xpdo/generating-the-model-code"
---

<div>- [Loading xPDOManager and xPDOGenerator](#GeneratingtheModelCode-LoadingxPDOManagerandxPDOGenerator)
- [Setting Class and Map Templates](#GeneratingtheModelCode-SettingClassandMapTemplates)
- [Generating the Files](#GeneratingtheModelCode-GeneratingtheFiles)

</div>To use your newly created XML schema, you'll need to create a PHP script that will parse the XML schema into the xPDO PHP classes and maps.

Loading xPDOManager and xPDOGenerator
-------------------------------------

Create a PHP file where you have access to an xPDO instance. Then, let's set the Log Target to the browser, and raise it a bit to get more detailed information.

```
<pre class="brush: php">
$xpdo->setLogLevel(XPDO_LOG_LEVEL_INFO);
$xpdo->setLogTarget(XPDO_CLI_MODE ? 'ECHO' : 'HTML');

```Now, we'll want to load the [xPDOManager](/xpdo/1.x/class-reference/xpdomanager "xPDOManager") and [xPDOGenerator](/xpdo/1.x/class-reference/xpdogenerator "xPDOGenerator") classes, to assist us with the model deployment.

```
<pre class="brush: php">
$manager= $xpdo->getManager();
$generator= $manager->getGenerator();

```Setting Class and Map Templates
-------------------------------

By default, xPDO provides you with default class and map templates. For the purposes of this example, however, we want to create class files and maps with PHPDoc formatting at the top, so we'll need to override the default class and map templates.

To do so, we'll just override the variables in the $generator object:

```
<pre class="brush: php">
$generator->classTemplate= <<<EOD
<?php
/**
 * [+phpdoc-package+]
 */
class [+class+] extends [+extends+] {
    function [+class+](& \$xpdo) {
        \$this->__construct(\$xpdo);
    }
    function __construct(& \$xpdo) {
        parent :: __construct(\$xpdo);
    }
}
?>
EOD;
$generator->platformTemplate= <<<EOD
<?php
/**
 * [+phpdoc-package+]
 */
require_once (strtr(realpath(dirname(dirname(__FILE__))), '\\\\', '/') . '/[+class-lowercase+].class.php');
class [+class+]_[+platform+] extends [+class+] {
    function [+class+]_[+platform+](& \$xpdo) {
        \$this->__construct(\$xpdo);
    }
    function __construct(& \$xpdo) {
        parent :: __construct(\$xpdo);
    }
}
?>
EOD;
$generator->mapHeader= <<<EOD
<?php
/**
 * [+phpdoc-package+]
 */
EOD;

```Note the \[+phpdoc-package+\] tag that we've built. This is taken from our "model" tag's attribute we defined earlier in the schema. These templates will provide us with the base for our class and map files, with PHPDoc comments.

Generating the Files
--------------------

And finally, we want to actually parse this into a file:

```
<pre class="brush: php">
$schema = '/path/to/storefinder.mysql.schema.xml';
$target = '/path/to/storefinder/model/';
$generator->parseSchema($schema,$target);

```This block of code executes the schema parsing method, and then outputs the total time the script took to execute. Run it, and viola! Our model/ directory now has a storefinder/ subdirectory, which is filled with all of our map and class files.