---
title: "modX.runSnippet"
_old_id: "1099"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.runsnippet"
---

## modX::runSnippet

Process and return the output from a PHP snippet by name.

## Syntax

``` php
string runSnippet (string $snippetName, [array $params = array ()])
```

- `$snippetName` _(string)_ The name of the Snippet you wish to call. **required**
- `$parameters` _(array)_ Key value pairs of parameters to pass to the snippet, equivalent to `&key=`value``

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::runSnippet()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::runSnippet())

``` php
string runSnippet (string $snippetName, [array $params = array ()])
```

## Example 

Run the 'Welcome' snippet with some custom parameters:

## Examples 

``` php
$output = $modx->runSnippet('Welcome',array(
   'name' => 'John'
));
echo $output; // prints 'Welcome John!'
```

**Handy Hint**
When you call a Snippet using **runSnippet**, the Snippet code is _always_ executed: the results are never returned from cache. It's equivalent to running the Snippet using the `[[!uncached]]` syntax. 

## See Also 

- [modX](extending-modx/core-model/modx "modX")
- [Snippets](extending-modx/snippets "Snippets")
