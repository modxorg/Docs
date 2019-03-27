---
title: "Writing a Good Snippet"
_old_id: "160"
_old_uri: "2.x/developing-in-modx/basic-development/snippets/how-to-write-a-good-snippet"
---

 For some, writing a MODX snippet might be their first foray into coding. Here are some tips for newbies and experienced developers alike.
 
##  Our Example Snippet 

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
// For debugging:
$modx->log(modX::LOG_LEVEL_DEBUG
    , '[mySnippet] called on page '. $modx->resource->id . ' with the following properties: '
    .print_r($scriptProperties, true));
// Verify Inputs
if (!isset($scriptProperties['x']) || !isset($scriptProperties['y'])) {
    $modx->log(modX::LOG_LEVEL_ERROR, '[mySnippet] missing required properties &x and &y!');
    return;
}
return $x * $y * $z;
?>
```

##  A Good Name 

 Give your Snippet a name that makes sense to someone who is not familiar with it. A good name is easy to remember.

##  Description 

 _Always_ include a brief description that explains what your Snippet does. It should be clear enough that a stranger (e.g. another manager user, not necessarily a developer) could understand what your code does just by reading your description.

##  Comment Block 

 _Always_ include a comment block in your Snippet! This is probably the single most important part of your Snippet! Even if you are not a coder, you can spot a good developer simply by the quality of their documentation and comments.

 Your comment block should include the following items:

####  DESCRIPTION 
  
  This is where you can describe your code in more detail.
####  PROPERTIES 
  
  Detail exactly which properties can be passed to your Snippet _and_ what type of data each property accepts. You should also specify whether the property is required or whether there is a default value. Here are some examples:
  
  &day integer a number from 0 (Sunday) to 6 (Saturday) representing the day of the week. (required) 
  &is\_secure boolean 1 will force an HTTPS connection; 0 uses an HTTP connection. Default: 1 
  &formatTpl string name of a Chunk used to format output. Default myChunk
####  USAGE 
  
   _Always_ include some examples of how to use your Snippet. These should be examples that users can literally copy and paste into their pages to see how your Snippet works.

##  Set Default Properties 

 Set default properties in the snippet's Properties tab. You can read properties passed to the Snippet and set default properties using the **getOption** method. Remember that all Snippets are passed an array of $scriptProperties.

 ``` php 
$headTpl = $modx->getOption('headTpl', $scriptProperties, 'myHeadTpl');
```

##  Do not include HTML 

 Your Snippet should be as clean from HTML as possible. If you need to format the output, use a Chunk to format the output. This is an important architectural principle!

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

 Never print or echo values in your Snippet. Snippets are like functions: they should _return_ data. While using print or echo statements may appear to work, they can have unexpected results. Always gather your output into a variable string such as $output and return that variable string.

##  Consistency 

 **Variable Names:** Whatever your coding style, be consistent. If you want to use camelCase variable names, then make sure all your variables use that style.

 **Indents:** Use the same indenting style throughout. See the MODX [Code Standards](_legacy/developing-in-modx/code-standards) for some great recommendations on how to structure your code.

##  Log Errors and Info 

 MODX has a logging function: _use it_. See [xPDO::log()](extending-modx/xpdo/class-reference/xpdo/xpdo.log). If your users forgot to include a required property, log an error so your users will know it.

 ``` php 
$modx->log(modX::LOG_LEVEL_ERROR, '[mySnippet] missing the &xyz property!');
```

 You can also log debugging info, which is useful for users who are debugging things. This will only be written to the error log when the log\_level system setting is set to the appropriate level.

 ``` php 
$modx->log(modX::LOG_LEVEL_DEBUG, '[mySnippet] was called with the following properties: '.print_r($scriptProperties,true));
```

##  See Also 

- [Code Standards](_legacy/developing-in-modx/code-standards "Code Standards")
  1. [Templating Your Snippets](extending-modx/snippets/templating)
  2. [Adding CSS and JS to Your Pages Through Snippets](extending-modx/snippets/register-assets)
  3. [How to Write a Good Snippet](extending-modx/snippets/good-snippet)
  4. [How to Write a Good Chunk](extending-modx/snippets/good-chunk)
