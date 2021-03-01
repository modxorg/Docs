---
title: "EVAL Binding"
_old_id: "107"
_old_uri: "2.x/making-sites-with-modx/customizing-content/template-variables/bindings/eval-binding"
note: "The @EVAL binding has been deprecated and removed in MODX 3.0."
---

## What is the @EVAL Binding?

The @EVAL Binding executes the specified PHP code. It should be used with careful security precautions.

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

There's a whole page showing an example of using the EVAL binding to execute a snippet: [Creating a multi-select box for related pages in your template](building-sites/tutorials/multiselect-related-pages "Creating a multi-select box for related pages in your template").

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

The use of `eval()` is a security sensitive binding and should be used with caution. For this reason it has also been removed in 3.0 and can be disabled sooner with the `allow_tv_eval` system setting.

## See Also

- [Template Variables](building-sites/elements/template-variables "Template Variables")
- [Bindings](building-sites/elements/template-variables/bindings "Bindings")
