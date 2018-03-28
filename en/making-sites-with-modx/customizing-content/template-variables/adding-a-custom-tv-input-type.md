---
title: "Adding a Custom TV Input Type"
_old_id: "11"
_old_uri: "2.x/making-sites-with-modx/customizing-content/template-variables/adding-a-custom-tv-input-type"
---

**Only use this documentation for pre-2.2 or core submissions.**
Refer to the [Adding a Custom TV Type](making-sites-with-modx/customizing-content/template-variables/adding-a-custom-tv-type-modx-2.2 "Adding a Custom TV Type - MODX 2.2") doc for the proper way to build custom TVs in 2.2 which allows easy packaging.

## What are Custom TV Input Types?

MODx Revolution allows you to create your own custom TV input types (similar to the textbox, radio, textarea, richtext, etc types already available) for your [Template Variables](making-sites-with-modx/customizing-content/template-variables "Template Variables").

## Creating the Files

To create a custom TV input type (let's say, one called "test"), you need a few things. Let's say my "test" TV input type loads a Template selecting combobox.

I'd first need 2 files:

- **An input controller** - put here: core/model/modx/processors/element/tv/renders/mgr/input/test.php
- **An input template** - put here: manager/templates/default/element/tv/renders/input/test.tpl

The input controller, test.php, would have:

``` php 
$this->xpdo->lexicon->load('tv_widget');
// any other PHP i want here
return $this->xpdo->smarty->fetch('element/tv/renders/input/test.tpl');
```

And the input template, test.tpl, for the default mgr theme would have (note that it is using [Smarty](http://smarty.net/) syntax):

``` php 
<select id="tv{$tv->id}" name="tv{$tv->id}" class="combobox"></select>
<script type="text/javascript">
// <![CDATA[
{literal}
MODx.load({
{/literal}
    xtype: 'modx-combo-template'
    ,transform: 'tv{$tv->id}'
    ,id: 'tv{$tv->id}'
    ,width: 300
{literal}
    ,listeners: { 'select': { fn:MODx.fireResourceFormChange, scope:this}}
});
{/literal}
// ]]>
</script>
```

And there you go! A custom TV input type.

![](/download/attachments/18678063/customtv1.png?version=1&modificationDate=1269467124000)

You don't have to use the ExtJS code as shown here to have a custom input type. It could even just be a straight HTML input. It's really up to you.

## See Also

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