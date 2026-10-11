---
title: "modResource.getResourceTypeName"
description: "Get the translatable name of the Resource type"
---

## modResource.getResourceTypeName

Returns a lexicon entry for the Resource type. The base implementation only special-cases `modDocument`, which is translated by the `document` key; every other class is looked up by its own class name.

Derivatives that need a different label override the method: `modWebLink`, `modSymLink` and `modStaticResource`. A class with no override and no lexicon entry comes back as its raw class name, because `modLexicon` returns a missing key unchanged.

## Syntax

``` php
string getResourceTypeName ()
```

## Example

``` php
$document = $modx->getObject('modDocument', array('id' => 5));
echo $document->getResourceTypeName();
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.getContextMenuText](extending-modx/core-model/modresource/modresource.getcontextmenutext)
