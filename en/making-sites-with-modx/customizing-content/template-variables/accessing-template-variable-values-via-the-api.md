---
title: "Accessing Template Variable Values via the API"
_old_id: "8"
_old_uri: "2.x/making-sites-with-modx/customizing-content/template-variables/accessing-template-variable-values-via-the-api"
---

- [Accessing Template Variable Values via the API](#AccessingTemplateVariableValuesviatheAPI-AccessingTemplateVariableValuesviatheAPI)
- [getTVValue](#AccessingTemplateVariableValuesviatheAPI-getTVValue)
  - [getTVValue Usage](#AccessingTemplateVariableValuesviatheAPI-getTVValueUsage)
- [setTVValue](#AccessingTemplateVariableValuesviatheAPI-setTVValue)
  - [setTVValue Usage](#AccessingTemplateVariableValuesviatheAPI-setTVValueUsage)
- [See Also](#AccessingTemplateVariableValuesviatheAPI-SeeAlso)
 


## Accessing Template Variable Values via the API

 Like just about everything in the MODX GUI, you can access Template Variables and their values via the MODX API. This relies on the xPDO method [getObject](/xpdo/2.x/class-reference/xpdo/xpdo.getobject "xPDO.getObject") and related functions, but we demonstrate some examples here because it relates directly to Template Variables.

## getTVValue

 ```
<pre class="brush: php">
string|null getTVValue (str|integer $tv_name OR ID of TV)

``` See **core/model/modx/modresource.class.php**

### getTVValue Usage

 Let's say we have a TV named 'bio', and we're going to retrieve page id 123 that uses this TV. Here's what our Snippet might look like:

 ```
<pre class="brush: php">
$page = $modx->getObject('modResource', 123);
return $page->getTVValue('bio');

``` getTVValue fetches values from the resource cache when available. These caches are normally cleared when saving a resource, however if you are updating TV values using the setTVValue method below, these values will not be reflected directly because of the cache. If you absolutely need the latest data, you could bypass the cache by going straight for the data and using getObject to get the TV value record.

 ```
<pre class="brush: php">
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

```## setTVValue

 Use **setTVValue** to save a new value to a TV. Unlike some other xPDO API methods, this method stores values to the database immediately, so you do not need to invoke a separate call to a **save()** method. This method does not clear the resource cache.

 ```
<pre class="brush: php">
boolean setTVValue (str|integer $tv_name OR ID of TV, string $value)

```### setTVValue Usage

 ```
<pre class="brush: php">
$page = $modx->getObject('modResource', 123);
if (!$page->setTVValue('bio', 'This is my new bio...')) {
    $modx->log(xPDO::LOG_LEVEL_ERROR, 'There was a problem saving your TV...');
}

```## See Also

1. [Creating a Template Variable](making-sites-with-modx/customizing-content/template-variables/creating-a-template-variable)
2. [Bindings](making-sites-with-modx/customizing-content/template-variables/bindings)
  1. [CHUNK Binding](making-sites-with-modx/customizing-content/template-variables/bindings/chunk-binding)
  2. [DIRECTORY Binding](making-sites-with-modx/customizing-content/template-variables/bindings/directory-binding)
  3. [EVAL Binding](making-sites-with-modx/customizing-content/template-variables/bindings/eval-binding)
  4. [FILE Binding](making-sites-with-modx/customizing-content/template-variables/bindings/file-binding)
  5. [INHERIT Binding](making-sites-with-modx/customizing-content/template-variables/bindings/inherit-binding)
  6. [RESOURCE Binding](making-sites-with-modx/customizing-content/template-variables/bindings/resource-binding)
  7. [SELECT Binding](making-sites-with-modx/customizing-content/template-variables/bindings/select-binding)
3. [Template Variable Input Types](making-sites-with-modx/customizing-content/template-variables/template-variable-input-types)
4. [Template Variable Output Types](making-sites-with-modx/customizing-content/template-variables/template-variable-output-types)
  1. [Date TV Output Type](making-sites-with-modx/customizing-content/template-variables/template-variable-output-types/date-tv-output-type)
  2. [Delimiter TV Output Type](making-sites-with-modx/customizing-content/template-variables/template-variable-output-types/delimiter-tv-output-type)
  3. [HTML Tag TV Output Type](making-sites-with-modx/customizing-content/template-variables/template-variable-output-types/html-tag-tv-output-type)
  4. [Image TV Output Type](making-sites-with-modx/customizing-content/template-variables/template-variable-output-types/image-tv-output-type)
  5. [URL TV Output Type](making-sites-with-modx/customizing-content/template-variables/template-variable-output-types/url-tv-output-type)
5. [Adding a Custom TV Type - MODX 2.2](making-sites-with-modx/customizing-content/template-variables/adding-a-custom-tv-type-modx-2.2)
6. [Adding a Custom TV Input Type](making-sites-with-modx/customizing-content/template-variables/adding-a-custom-tv-input-type)
7. [Adding a Custom TV Output Type](making-sites-with-modx/customizing-content/template-variables/adding-a-custom-tv-output-type)
8. [Creating a multi-select box for related pages in your template](making-sites-with-modx/customizing-content/template-variables/creating-a-multi-select-box-for-related-pages-in-your-template)
9. [Accessing Template Variable Values via the API](making-sites-with-modx/customizing-content/template-variables/accessing-template-variable-values-via-the-api)