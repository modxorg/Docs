---
title: "BabelTranslation"
_old_id: "788"
_old_uri: "revo/babel/babel.babeltranslation"
---

The BabelTranslation snippets returns the ID of a translated resource in a given context.

## Available Parameters

| Name            | Description                                                                    | Default               |
| --------------- | ------------------------------------------------------------------------------ | --------------------- |
| resourceId      | (optional) ID of resource of which a translated resource should be determined. | current resource's ID |
| contextKey      | Key of context in which translated resource should be determined.              |                       |
| showUnpublished | (optional) Flag whether to show unpublished translations.                      | 0                     |

## Example

``` php
[[BabelTranslation? &contextKey=`de`]]
```

This will return the ID of the translated resource located in the "de" context of the current resource.

## See Also

1. [Babel.BabelLinks](extras/babel/babellinks)
2. [Babel.BabelTranslation](extras/babel/babeltranslation)

[Offical Babel project website: Multilingual websites with MODX](http://www.multilingual-modx.com/)
