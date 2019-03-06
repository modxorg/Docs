---
title: "EVAL Binding"
_old_id: "107"
_old_uri: "2.x/making-sites-with-modx/customizing-content/template-variables/bindings/eval-binding"
---

## What is the @EVAL Binding?

The @EVAL Binding executes the specified PHP code. It should be used with careful security precautions.

**Important: the @EVAL binding has been deprecated and removed in MODX 3.0.**

## Syntax

``` php 
@EVAL php_code_here

```

## Usage

Simply put a PHP statement after the @EVAL tag:

``` php 
@EVAL return "The time stamp is now ".time();

```

 ``` php 
@EVAL $a = 'dog'; return $a;

```

## Examples

### Showing Related Posts

There's a whole page showing an example of using the EVAL binding to execute a snippet: [Creating a multi-select box for related pages in your template](making-sites-with-modx/customizing-content/template-variables/creating-a-multi-select-box-for-related-pages-in-your-template "Creating a multi-select box for related pages in your template").

### db-driven input-option-values by using rowboat

Let's say we want to have a dropdown-box to select a user-id by username. 
Requirements: The rowboat-snippet.

First, we create a new chunk for our Options and name it 'userOption' with this code:

``` php 
[[+username]]==[[+id]]

```

Then create a dropdown-type TV with this input-options:

``` php 
@EVAL return '-- choose a user --||' . $modx->runSnippet('Rowboat',array('table'=>'modx_users','tpl'=>'userOption','outputSeparator'=>'||'));

```

## Security

The eval() statement raises an eyebrow with anyone concerned with security: eval statements are notorious for being exploited, so it's recommended that you find another way of doing whatever you are trying to do, but this context is supported by MODx. If I let my cynical mind wander, allow me to paint one disasterous circumstance: some web user of your MODx application logs in and has access to a field that gets executed by an EVAL binding. This nefarious user could eval some nasty _unlink()_ or _rmdir()_ statements and destroy your web server files, or read sensitive files **anywhere** on the web-server that PHP has access to. Be careful with these!

Thankfully, I've been unsuccessful in my attempts to unlink() a file using the @EVAL binding... but I'm sure there are people out there more clever than me...

## See Also

- [Template Variables](making-sites-with-modx/customizing-content/template-variables "Template Variables")
- [Bindings](making-sites-with-modx/customizing-content/template-variables/bindings "Bindings")