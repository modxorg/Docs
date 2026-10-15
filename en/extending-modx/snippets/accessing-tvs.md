---
title: "Accessing TV Values"
_old_id: "8"
_old_uri: "2.x/making-sites-with-modx/customizing-content/template-variables/accessing-template-variable-values-via-the-api"
---

Read and write TV values through the resource API; the examples below rely on the xPDO method [getObject](extending-modx/xpdo/class-reference/xpdo/xpdo.getobject "xPDO.getObject") and related functions.

## getTVValue

``` php
string|null getTVValue (str|integer $tv_name OR ID of TV)
```

See **core/src/Revolution/modResource.php** (methods `getTVValue()` and `setTVValue()`)

### getTVValue Usage

Read the TV `bio` from resource 123:

``` php
$page = $modx->getObject('modResource', 123);
return $page->getTVValue('bio');
```

getTVValue reads the resource cache when a cached value exists. Saving a resource normally clears that cache, but `setTVValue` below does not, so a value it just wrote may stay invisible to `getTVValue`. When you need the current data, bypass the cache and read the TV value record with getObject:

``` php
$tvr = $modx->getObject('modTemplateVarResource', array(
  'tmplvarid' => $tvId,
  'contentid' => $resourceId
));
if ($tvr) {
  return $tvr->get('value');
}
else {
  $tv = $modx->getObject('modTemplateVar', $tvId);
  if ($tv) return $tv->get('default_text');
}
return '';
```

## setTVValue

Use **setTVValue** to save a new value to a TV. Unlike some other xPDO API methods, this method stores values to the database immediately, so you do not need to invoke a separate call to a **save()** method. This method does not clear the resource cache.

``` php
boolean setTVValue (str|integer $tv_name OR ID of TV, string $value)
```

If the new value equals the TV's `default_text`, setTVValue does not write a row — it **removes** the existing `modTemplateVarResource` record instead, so the TV falls back to its default. An immediate getTVValue after setTVValue may still return a cached value.

### setTVValue Usage

``` php
$page = $modx->getObject('modResource', 123);
if (!$page->setTVValue('bio', 'This is my new bio...')) {
    $modx->log(xPDO::LOG_LEVEL_ERROR, 'There was a problem saving your TV...');
}
```

## See Also

- [Creating a Template Variable](building-sites/elements/template-variables/step-by-step)
- [Bindings](building-sites/elements/template-variables/bindings)
    - [CHUNK Binding](building-sites/elements/template-variables/bindings/chunk-binding)
    - [DIRECTORY Binding](building-sites/elements/template-variables/bindings/directory-binding)
    - [FILE Binding](building-sites/elements/template-variables/bindings/file-binding)
    - [INHERIT Binding](building-sites/elements/template-variables/bindings/inherit-binding)
    - [RESOURCE Binding](building-sites/elements/template-variables/bindings/resource-binding)
    - [SELECT Binding](building-sites/elements/template-variables/bindings/select-binding)
- [Template Variable Input Types](building-sites/elements/template-variables/input-types)
- [Template Variable Output Types](building-sites/elements/template-variables/output-types)
    - [Date TV Output Type](building-sites/elements/template-variables/output-types/date)
    - [Delimiter TV Output Type](building-sites/elements/template-variables/output-types/delimiter)
    - [HTML Tag TV Output Type](building-sites/elements/template-variables/output-types/html)
    - [Image TV Output Type](building-sites/elements/template-variables/output-types/image)
    - [URL TV Output Type](building-sites/elements/template-variables/output-types/url)
- [Adding a Custom TV Type - MODX 2.2](extending-modx/custom-tvs)
- [Creating a multi-select box for related pages in your template](building-sites/tutorials/multiselect-related-pages)
