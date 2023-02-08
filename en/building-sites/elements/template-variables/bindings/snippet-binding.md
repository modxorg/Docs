---
title: "SNIPPET Binding"
---

## What is the @SNIPPET Binding?

The @SNIPPET Binding executes the specified MODX snippet. It should be used with careful security precautions.

## Syntax

``` php
@SNIPPET snippet_name [properties_as_json]
```

Binds the variable to a snippet. Where snippet_name is the name of the snippet. The returned value is the output of the snippet.\
The JSON formatted properties are optional and are passed as scriptProperties to the snippet.

## Usage

let's have a snippet `datefmt` with this code

``` php
<?php
$locale = $modx->getOption('locale',$scriptProperties,'en_US');
$pattern = $modx->getOption('pattern',$scriptProperties,'YYYY/MM/dd');

$fmt = datefmt_create(
    $locale,
    IntlDateFormatter::FULL,
    IntlDateFormatter::FULL,
    null,
    null,
    $pattern
);
return datefmt_format($fmt, time());
```

In Default Text simply put a snippet name after the @SNIPPET tag:

``` php
@SNIPPET datefmt
```

``` php
@SNIPPET datefmt {"locale":"de-DE","pattern":"EEEE, dd.MM.YYYY"}
```

## Examples

### Showing Related Posts

There's a whole page showing an example of using the SNIPPET binding to generate input-options: [Creating a multi-select box for related pages in your template](building-sites/tutorials/multiselect-related-pages "Creating a multi-select box for related pages in your template").

### db-driven input-option-values by using migxLoopCollection

Let's say we want to have a dropdown-box to select a user-id by username.\
Requirements: MIGX installed.

Then create a listbox TV with this input-options:

``` php
@SNIPPET migxLoopCollection {"classname":"modUser","tpl":"@CODE:[[+username]]==[[+id]]","outputSeparator":"||","wrapperTpl":"@CODE:-- select a user--==0||[[+output]]"}
```

## See Also

- [Template Variables](building-sites/elements/template-variables "Template Variables")
- [Bindings](building-sites/elements/template-variables/bindings "Bindings")
