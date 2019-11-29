---
title: "Accessing TV Values"
_old_id: "8"
_old_uri: "2.x/making-sites-with-modx/customizing-content/template-variables/accessing-template-variable-values-via-the-api"
---

## Accessing Template Variable Values via the API

Like just about everything in the MODX GUI, you can access Template Variables and their values via the MODX API. This relies on the xPDO method [getObject](extending-modx/xpdo/class-reference/xpdo/xpdo.getobject "xPDO.getObject") and related functions, but we demonstrate some examples here because it relates directly to Template Variables.

## getTVValue

``` php
string|null getTVValue (str|integer $tv_name OR ID of TV)
```

See **core/model/modx/modresource.class.php**

### getTVValue Usage

Let's say we have a TV named 'bio', and we're going to retrieve page id 123 that uses this TV. Here's what our Snippet might look like:

``` php
$page = $modx->getObject('modResource', 123);
return $page->getTVValue('bio');
```

getTVValue fetches values from the resource cache when available. These caches are normally cleared when saving a resource, however if you are updating TV values using the setTVValue method below, these values will not be reflected directly because of the cache. If you absolutely need the latest data, you could bypass the cache by going straight for the data and using getObject to get the TV value record.

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

Note that when using setTVValue, it is possible for an immediate getTVValue to return a cached value.

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
  - [EVAL Binding](building-sites/elements/template-variables/bindings/eval-binding)
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
- [Accessing Template Variable Values via the API](extending-modx/snippets/accessing-tvs)
