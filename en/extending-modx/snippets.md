---
title: "Writing Snippets"
description: How MODX snippets execute, how to pass properties into them, and how they differ from chunks and static snippets"
_old_id: "292"
_old_uri: "2.x/developing-in-modx/basic-development/snippets"
---

## What is a Snippet?

Snippets are how MODX runs dynamic PHP inside your pages.

A Snippet is a short, reusable piece of PHP that returns a value. A [Chunk](building-sites/elements/chunks) returns static markup with placeholders; a Snippet computes its output at render time.

## How Snippets Execute

A cacheable Snippet is compiled into an ordinary include file under `cache/includes/elements/modsnippet/` and executed with `include`. Its body is not wrapped in a function — there is no `eval()` and no generated function, so `$this` does not exist inside a Snippet and `$modx` is the only object in scope.

Whether a Snippet is cached is decided by its tag, not by a property: `[[mySnippet]]` is cacheable, `[[!mySnippet]]` is not. The `cache_type` column on Snippets is deprecated and never read.

Once executed, the output is parsed by the MODX Parser, so it can contain element tags.

## Simple Example

Here's a basic example of what a Snippet's code might look like:

``` php
<?php
return 'Hello, World!';
```

If you named this _"helloWorld"_, you could call this snippet by using `[[helloWorld]]` in your documents, templates, or Chunks (see [Tag Syntax](building-sites/tag-syntax "Tag Syntax")). You can also call a Snippet from another Snippet using the [runSnippet](extending-modx/modx-class/reference/modx.runsnippet "modX.runSnippet") API method.

Returning the value is the convention. `echo` works as well — MODX starts an output buffer before including the file and prepends whatever was echoed to the returned value — but a `return` keeps the output in one place.

## Passing Values Into a Snippet

Values are passed with a CGI-style notation that follows the Snippet name. For a Snippet named `mySnippet`:

``` php
[[!mySnippet? &input=`Hello World`]]
```

And the code for your Snippet might look something like this:

``` php
<?php
return 'My input was: ' . $input;
?>
```

Names must match exactly, case included: `input`, not `INPUT`. Keep the `&` prefix, and use **backticks** rather than single quotes.

### Reading Values

In general, you can read your values by referencing the arguments that were passed: **&someParameter** in the call translates to **$someParameter** in the PHP code.

The whole array is available as `$scriptProperties`, which suits a Snippet whose parameter names are not known in advance.

For example, if you call your Snippet using a call like this:

``` php
[[!mySnippet? &x=`x-ray` &y=`yellow`]]
```

Then the **$scriptProperties** array will contain this:

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

1. **SQL abstraction** — the same code runs on MySQL, SQLite, and PostgreSQL.
2. **Parameter escaping** — xPDO binds values through PDO, so SQL injection has no path in.
3. **Shorter code** — work that took 40 lines of `mysql_*` calls becomes about ten.

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

$chunk is an [xPDOObject](extending-modx/xpdo/class-reference/xpdoobject "xPDOObject") — an object representation of the Chunk, with its placeholders already processed.

For real queries use `$modx->newQuery()` — here to get the first 10 published Resources under parents 23, 24 or 25, sorted by menuindex:

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

`newQuery()` takes the class name, `where()` adds restrictions, then `sortby()` and `limit()` bound the result.

`getCollection()` returns an array of objects; `getObject()` returns one.

## Further Database Reading

For further reading on xPDO, read up on these:

- xPDO at the [xPDO](extending-modx/xpdo "xPDO") space
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

That way you can lint the file from the command line (_php -l my\_script.php_) and get real error output while you work. Move the code into the Manager only once it works.

::: warning
A PHP file under the web root is callable by anyone. Keep snippet files outside the web root, or move the `core/` directory out of it, before you deploy. Guarding the file with an "am I inside MODX" test is weaker than moving it.
:::

## Don't mix PHP and HTML in a Snippet

Snippets execute PHP code, so a Snippet's code must be valid PHP on its own. The code below is not:

``` php
<p>This is a horrible mixture of HTML and PHP</p>
<?php
return "<p>and PHP!  Don't try it!  It's bad architecture and it won't work!!</p>";
?>
```

MODX prepends a single `<?php` to the code before writing it to the cache, so the file that actually runs starts with `<?php` followed by your stray HTML — a syntax error, not the `<?php … ?>` pair the old versions of this page claimed.

If you need to do something like this, **use a Chunk** - separate the PHP into a Snippet, load its output into a placeholder with the [modx API](extending-modx/core-model/modx "modX") placeholder functions or chunk processing, and include the Snippet's placeholders in the Chunk:

``` php
$output = $modx->getChunk('myChunk',array(
  'placeholderOne' => 'test',
  'name' => 'Harry',
  'scar' => 'Lightning',
));
return $output;
```

## Don't Work on Live Snippets

If you're writing new versions of Snippets, _duplicate_ the old version! That way you can go back to the old version of the code if something doesn't work correctly! MODX doesn't inherently do versioning control, so you have to backup code yourself.

## Use Default Properties

Consider adding default properties for your snippet into the snippet's Properties tab, so that the user can add custom [Property Sets](building-sites/properties-and-property-sets "Properties and Property Sets") to override them.

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
