---
title: "Writing a Good Snippet"
_old_id: "160"
_old_uri: "2.x/developing-in-modx/basic-development/snippets/how-to-write-a-good-snippet"
---

## Our Example Snippet

``` php
<?php
/**
 * mySnippet
 *
 * DESCRIPTION
 *
 * This Snippet multiplies numbers &x and &y. This demonstrates
 * some good habits.
 *
 * PROPERTIES:
 *
 * &x integer required
 * &y integer required
 * &z integer optional. Default: 1
 *
 * USAGE:
 *
 * [[!mySnippet? &x=`5` &y=`7`]]
 *
 */
$x = (int) $modx->getOption('x', $scriptProperties);
$y = (int) $modx->getOption('y', $scriptProperties);
$z = (int) $modx->getOption('z', $scriptProperties, 1);
// Verify Inputs
if (!isset($scriptProperties['x']) || !isset($scriptProperties['y'])) {
    $modx->log(modX::LOG_LEVEL_ERROR, '[mySnippet] missing required properties &x and &y!');
    return;
}
return $x * $y * $z;
?>
```

## A Good Name

Pick a name that makes sense to someone who has not seen the Snippet before; a good name is easy to remember.

## Description

_Always_ include a brief description that explains what your Snippet does. It should be clear enough that a stranger (e.g. another manager user, not necessarily a developer) could understand what your code does just by reading your description.

## Comment Block

_Always_ include a comment block in your Snippet; treat it as its most important part. It covers three things:

### DESCRIPTION
  
Describe your code in more detail here.
  
### PROPERTIES
  
List every property the Snippet accepts, its data type, and whether it is required or has a default. Examples:
  
`&day` integer a number from 0 (Sunday) to 6 (Saturday) representing the day of the week. (required)
`&is_secure` boolean 1 will force an HTTPS connection; 0 uses an HTTP connection. Default: 1
`&formatTpl` string name of a Chunk used to format output. Default myChunk

### USAGE
  
Give examples users can copy and paste into their pages to see the Snippet work.

## Set Default Properties

Set default properties in the snippet's Properties tab. You can read properties passed to the Snippet and set default properties using the **getOption** method. Remember that all Snippets are passed an array of `$scriptProperties`.

``` php
$headTpl = $modx->getOption('headTpl', $scriptProperties, 'myHeadTpl');
```

## Do not include HTML

Keep HTML out of your Snippet and format the output with a Chunk instead — that separation is the point of the architecture:

``` php
$props = array(
    'cow' => 'Moo',
    'pig' => 'Oink',
);
return $modx->getChunk('myChunk', $props);
```

Using the placeholders in the chunk:

``` html
<!-- myChunk -->
A cow says "[[+cow]]" and a pig says "[[+pig]]".
```

## Do not Print or Echo

Never print or echo values in your Snippet; Snippets return data. Echoed output is not lost — MODX buffers it and prepends it to the value you return — but mixing the two makes the result order unpredictable: duplicates, stray whitespace, output in front of an error return. Gather the output into a string such as `$output` and return that.

## Consistency

Be consistent: one variable naming style and one indent style throughout the Snippet.

## Log Errors and Info

MODX has a logging function: _use it_. See [xPDO::log()](extending-modx/xpdo/class-reference/xpdo/xpdo.log). If your users forgot to include a required property, log an error so your users will know it.

``` php
$modx->log(modX::LOG_LEVEL_ERROR, '[mySnippet] missing the &xyz property!');
```

You can also log debugging info, which is useful for users who are debugging things. This will only be written to the error log when the `log_level` system setting is set to the appropriate level.

``` php
$modx->log(modX::LOG_LEVEL_DEBUG, '[mySnippet] was called with the following properties: '.print_r($scriptProperties,true));
```

## See Also

1. [Templating Your Snippets](extending-modx/snippets/templating)
2. [Adding CSS and JS to Your Pages Through Snippets](extending-modx/snippets/register-assets)
3. [How to Write a Good Chunk](extending-modx/snippets/good-chunk)
