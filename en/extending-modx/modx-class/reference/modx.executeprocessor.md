---
title: "modX.executeProcessor"
_old_id: "1057"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.executeprocessor"
---

## modX::executeProcessor

This method is removed in 2.1, and replaced by `$modX->runProcessor`

Executes a specific processor. The only argument is an array, which can take the following values:

- `action` - The action to take, similar to connector handling.
- `processors\_path` - If specified, will override the default MODX processors path.
- `location` - A prefix to load processor files from, will prepend to the action parameter.

## Syntax

API Doc: [modX::runProcessor()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::runProcessor())

``` php
mixed executeProcessor (array $options)
```

## Example

Execute the Context getList processor:

``` php
$modx->executeProcessor(array(
    'location' => 'context',
    'action' => 'getList',
));
```

## See Also

- [modX](extending-modx/core-model/modx "modX")
