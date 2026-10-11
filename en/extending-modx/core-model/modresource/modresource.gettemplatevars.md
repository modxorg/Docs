---
title: "modResource.getTemplateVars"
description: "Get the Template Variables of a Resource with their values"
---

## modResource::getTemplateVars

Returns the Template Variables bound to the Resource's Template. Each object carries its current value: the value saved for this Resource or, when there is none, the TV default. The collection is built by the static `getTemplateVarCollection()` and ordered by the TV rank in the Template.

A new Resource has no stored values, so only defaults come back. `getMany('TemplateVars', 'all')` routes to the same code.

## Syntax

``` php
array getTemplateVars ()
```

## Example

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
foreach ($resource->getTemplateVars() as $tv) {
    echo $tv->get('name') . ': ' . $tv->get('value');
}
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.getTVValue](extending-modx/core-model/modresource/modresource.gettvvalue)
