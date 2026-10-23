---
title: "Writing Snippets"
description: How MODX snippets execute, how to pass properties into them, and how they differ from chunks and static snippets"
_old_id: "292"
_old_uri: "2.x/developing-in-modx/basic-development/snippets"
---

## What is a Snippet?

A Snippet is reusable PHP that returns a value. A [Chunk](building-sites/elements/chunks) returns static markup with placeholders. A Snippet computes its output when the page renders.

## How Snippets Execute

MODX writes the snippet body to an include file and runs it with `include`.

- Core snippet file: `cache/includes/elements/modx/revolution/modsnippet/{id}.include.cache.php`.
- The directory follows the snippet class. Backslashes and underscores in the class name become slashes.
- The body is not wrapped in a function. There is no `eval()` and no generated function.
- The include runs inside the snippet object. `$this` is that object. `$modx` is in scope. Call `makeUrl` and the other MODX methods on `$modx`.

The tag decides caching, not a property. `[[mySnippet]]` is cacheable. `[[!mySnippet]]` is not. The `cache_type` column on Snippets is deprecated and never read.

After execution, the MODX Parser parses the output, so it can contain element tags.

## Simple Example

``` php
<?php
return 'Hello, World!';
```

Name it _helloWorld_ and call it with `[[helloWorld]]` in Resources, Templates, or Chunks (see [Tag Syntax](building-sites/tag-syntax "Tag Syntax")). Call it from another Snippet with [runSnippet](extending-modx/modx-class/reference/modx.runsnippet "modX.runSnippet").

Returning the value is the convention. `echo` also works. MODX starts an output buffer before including the file and prepends whatever was echoed to the returned value. A `return` keeps the output in one place.

## Passing Values Into a Snippet

Values are passed with a CGI-style notation that follows the Snippet name. For a Snippet named `mySnippet`:

``` php
[[!mySnippet? &input=`Hello World`]]
```

Snippet:

``` php
<?php
return 'My input was: ' . $input;
?>
```

Names must match exactly, case included: `input`, not `INPUT`. Keep the `&` prefix, and use **backticks** rather than single quotes.

### Reading Values

**&someParameter** in the call is **$someParameter** in the PHP.

The whole array is available as `$scriptProperties`, which suits a Snippet whose parameter names are not known in advance.

This call:

``` php
[[!mySnippet? &x=`x-ray` &y=`yellow`]]
```

fills **$scriptProperties** with:

``` php
Array(
 'x' => 'x-ray',
 'y' => 'yellow'
)
```

If the Snippet has Properties tab entries or a property set from `[[mySnippet@setName]]`, those merge in first and call parameters override them by key.

## Database Interaction in Snippets

MODX reaches the database through [xPDO](extending-modx/xpdo "xPDO"), an ORM built on PDO. Load data with [getObject](extending-modx/xpdo/class-reference/xpdo/xpdo.getobject "xPDO.getObject") and [getCollection](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection") rather than writing raw queries.

## Why an ORM?

1. **SQL abstraction.** The same xPDO calls run on MySQL in this distribution.
2. **Parameter escaping.** xPDO binds values through PDO, so SQL injection has no path in.
3. **Shorter code.** Work that took 40 lines of `mysql_*` calls becomes about ten.

## Example DB Code

Take a chunk named `LineItem` and replace its `[[+placeholderName]]` placeholders with values:

``` php
$chunk = $modx->getObject('modChunk',array(
   'name' => 'LineItem',
));
if (!$chunk) return 'No line item chunk!';
return $chunk->process(array(
   'name' => 'G.I. Joe',
   'grenades' => 42,
));
```

$chunk is an [xPDOObject](extending-modx/xpdo/class-reference/xpdoobject "xPDOObject") for that Chunk.

For real queries use `$modx->newQuery()`. The query below loads the first 10 published Resources under parents 23, 24, or 25, sorted by menuindex:

``` php
$c = $modx->newQuery('modResource');
$c->where(array(
   'parent:IN' => array(23,24,25),
   'deleted' => false,
   'hidemenu' => false,
   'published' => true,
));
$c->sortby('menuindex','ASC');
$c->limit(10);
$resources = $modx->getCollection('modResource',$c);
```

`getCollection()` returns an array of objects. `getObject()` returns one.

## Further Database Reading

- [xPDO](extending-modx/xpdo "xPDO")
- [Retrieving Objects](extending-modx/xpdo/retrieving-objects "Retrieving Objects") in xPDO
- The [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery") Object

## Develop Snippets Outside the Manager

Point a [static Snippet](building-sites/elements/static-elements) at a file on disk instead of pasting code into the Manager:

``` php
[[!include? &file=`/absolute/path/to/my/snippet.php`]]
```

The body can stay thin:

``` php
if (file_exists($file)) {
   $o = include $file;
} else { $o = 'File not found at: '.$file; }
return $o;
```

Check the file from the command line (_php -l my\_script.php_) and read the error output while you work. Move the code into the Manager only once it works.

> [!WARNING]
> A PHP file under the web root is callable by anyone. Keep snippet files outside the web root, or move the `core/` directory out of it, before you deploy. Guarding the file with an "am I inside MODX" test is weaker than moving it.

## Don't mix PHP and HTML in a Snippet

Snippets execute PHP code, so a Snippet's code must be valid PHP on its own. The code below is not:

``` php
<p>This is a horrible mixture of HTML and PHP</p>
<?php
return "<p>and PHP!  Don't try it!  It's bad architecture and it won't work!!</p>";
?>
```

MODX prepends a single `<?php` to the code before writing it to the cache. The file that runs starts with `<?php` followed by the stray HTML. That is a syntax error, not the `<?php … ?>` pair older versions of this page claimed.

Put the HTML in a Chunk and keep the PHP in the Snippet. Load the Chunk with the [modX](extending-modx/core-model/modx "modX") placeholder functions, or with chunk processing. Put the Snippet's placeholders in the Chunk:

``` php
$output = $modx->getChunk('myChunk',array(
  'placeholderOne' => 'test',
  'name' => 'Harry',
  'scar' => 'Lightning',
));
return $output;
```

## Don't Work on Live Snippets

_Duplicate_ the Snippet before you replace it. MODX does not version element code, so the old copy is your backup.

## Use Default Properties

Consider default properties on the Snippet's Properties tab, so the user can override them with [Property Sets](building-sites/properties-and-property-sets "Properties and Property Sets").

## See Also

- [Snippets in content](building-sites/elements/snippets): cached vs. uncacheable calls and Property Sets
- [Static Snippets](building-sites/elements/static-elements): calling a Snippet file directly
- [Parsing MODX Tags](extending-modx/parsing-tags): re-parsing Snippet output
- [log_snippet_not_found](building-sites/settings/log_snippet_not_found)
- [Templating Your Snippets](extending-modx/snippets/templating)
- [Adding CSS and JS to Your Pages Through Snippets](extending-modx/snippets/register-assets)
- [How to Write a Good Snippet](extending-modx/snippets/good-snippet)
- [How to Write a Good Chunk](extending-modx/snippets/good-chunk)

- [modX.runSnippet](extending-modx/modx-class/reference/modx.runsnippet "modX.runSnippet")
- [modX.setPlaceholder](extending-modx/modx-class/reference/modx.setplaceholder "modX.setPlaceholder")
- [modX.regClientCSS](extending-modx/modx-class/reference/modx.regclientcss "modX.regClientCSS")
