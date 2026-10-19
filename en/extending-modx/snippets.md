---
title: "Writing Snippets"
_old_id: "292"
_old_uri: "2.x/developing-in-modx/basic-development/snippets"
---

## Overview

Snippets are the method by which MODX allows you to run dynamic PHP code in any of your pages. They are the main development vehicle for most developers.

### What is a Snippet?

According to one definition, a "snippet" is "a short reusable piece of computer source code". Some people have a hard time distinguishing this from a "chunk", so a helpful mnemonic might lie in the p's... as in "PHP", e.g. sni-"P(h)P"-et.

### How Do They Work?

A cacheable Snippet is compiled into an ordinary include file under `cache/includes/elements/modsnippet/` and executed with `include`. Its body is not wrapped in a function — there is no `eval()` and no generated function, so `$this` does not exist inside a Snippet and `$modx` is the only object in scope.

Whether a Snippet is cached is decided by its tag, not by a property: `[[mySnippet]]` is cacheable, `[[!mySnippet]]` is not. The `cache_type` column on Snippets is deprecated and never read.

Once executed, the output is parsed by the MODX Parser, so it can contain element tags.

### Simple Example

Here's a basic example of what a Snippet's code might look like:

``` php
<?php
return 'Hello, World!';
```

If you named this _"helloWorld"_, you could call this snippet by using `[[helloWorld]]` in your documents, templates, or Chunks (see [Tag Syntax](building-sites/tag-syntax "Tag Syntax")). You can also call a Snippet from another Snippet using the [runSnippet](extending-modx/modx-class/reference/modx.runsnippet "modX.runSnippet") API method.

Returning the value is the convention. `echo` works as well — MODX starts an output buffer before including the file and prepends whatever was echoed to the returned value — but a `return` keeps the output in one place.

### Passing Values Into a Snippet

Values are passed to your Snippet using a modifed CGI web-form type notation that follows the Snippet's name. If your Snippet were named "mySnippet", you might call it using something like this:

``` php
[[!mySnippet? &input=`Hello World`]]
```

And the code for your Snippet might look something like this:

``` php
<?php
return 'My input was: ' . $input;
?>
```

Notice that the variable names in the calling bit need to match the variable names in the Snippet EXACTLY (case matters... i.e. 'input' not 'INPUT' or 'Input'). Secondly, don't forget the '&' in front of the would-be variable names. And last but most certainly not least, take note that those are **backticks**, not single quotes!

### Reading Values in your Snippets

In general, you can read your values by referencing the arguments that were passed: **&someParameter** in the call translates to **$someParameter** in the PHP code.

You can also read _all_ parameters by using the built-in **$scriptProperties** array. This is useful if your Snippet takes variable parameters – it handles a similar use-case as PHP's [func\_get\_args()](http://www.php.net/manual/en/function.func-get-args.php) function.

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

If the Snippet has entries on its Properties tab, or a Property Set assigned via `[[mySnippet@setName]]`, those are merged in first and the call parameters override them by key.

## Database Interaction in Snippets

Accessing the database layer in MODX relies on an Object Relational Model (ORM) called [xPDO](extending-modx/xpdo "xPDO") for database connectivity, so you won't often write raw database queries like you might do in other CMS's. Usually you will access data from the database using several MODX objects and methods such as [getObject](extending-modx/xpdo/class-reference/xpdo/xpdo.getobject "xPDO.getObject") and [getCollection](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection"). This relies on the underlying xPDO framework.

### Why an ORM?

You might be asking, why use an ORM instead of just straight SQL? Well, a few reasons:

1. **SQL Abstraction** - This means that you can write code that works in a variety of different database types, such as MySQL, sqllite, postegresql, and more, as MODX expands to those databases. All without having to rewrite a single line of code. This makes it ideal for plugin authors who want their code to be executable on the widest possible variety of systems.
2. **Parameter Escaping** - No more having to worry about SQL injection; xPDO uses PHP's PDO to escape all variables passed in to the SQL call to prevent any malicious calls.
3. **Cleaner, shorter Code** - What could be done in 40+ lines in mysql\_\* calls can now be done in 10 or less.

There are more reasons, but that's for brevity. Let's look at a few examples:

### Example DB Code

Let's get a chunk named 'LineItem', and change the placeholders in it (done with `[[+placeholderName]]` syntax) to some custom values:

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

That code would get a chunk with the name of 'LineItem', and return it processed with the placeholders set. The $chunk variable there is actually an [xPDOObject](extending-modx/xpdo/class-reference/xpdoobject "xPDOObject"), which is an object representation of the Resource.

What about more complex queries? Like, say, getting the first 10 Resources with a parent of 23, 24 or 25. And let's make it so they aren't hidden from menus or deleted, are published, and sort them by menuindex. That's when we use the powerful $modx->newQuery() method:

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

Note how we first create an xPDOQuery object ($c) using $modx->newQuery(). We passed in the name of the class we wanted to build the query from - here 'modResource', or Resources - and then used our where() function to add some restrictions. Then we sorted and limited them.

And finally, we called getCollection which - unlike getObject - returns a collection, or array, of xPDOObjects. We could then iterate over those using foreach and do whatever we want with them.

### Further Database Reading

For further reading on xPDO, read up on these:

- xPDO at the [xPDO](extending-modx/xpdo "xPDO") space
- [Retrieving Objects](extending-modx/xpdo/retrieving-objects "Retrieving Objects") in xPDO
- The [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery") Object

## Recommended Methods and Tips

### Write your Snippets outside of the MODX Manager

As of 2.2.0, you can simply add a "static" Snippet: just reference the static file.

Pre 2.2.0, it's still pretty easy to do - just create an 'include' snippet, but make its content be this:

``` php
if (file_exists($file)) {
   $o = include $file;
} else { $o = 'File not found at: '.$file; }
return $o;
```

You can use the include snippet on a page like such:

``` php
[[!include? &file=`/absolute/path/to/my/snippet.php`]]
```

And run your Snippets externally while you develop them!

Then you can test them to make sure they work (e.g. on the bash command line, you can use the command _php -l my\_script.php_ to check the script for syntax errors). Depending on your environment, you may also get some useful error messages to help you with debugging. Copy and paste the code into MODX only when you're sure it's working.

Remember that a snippet in a file on your web site can be executed by anyone with a web browser, so don't leave them there on a live site unless you've placed the snippet code outside the web root so the file can't be accessed via the web. In MODX Revolution, you can put the snippet files under the core directory and move the entire directory outside the web root. You can also put a test in the snippet that makes it exit if it's not running inside MODX, but it's safest just to move the file or paste the code into a snippet in the Manager and delete the file.

### Don't mix PHP and HTML in a Snippet

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

### Don't Work on Live Snippets

If you're writing new versions of Snippets, _duplicate_ the old version! That way you can go back to the old version of the code if something doesn't work correctly! MODX doesn't inherently do versioning control, so you have to backup code yourself.

### Use Default Properties

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
