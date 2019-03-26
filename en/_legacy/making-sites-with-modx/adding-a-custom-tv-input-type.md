---
title: "Adding a Custom TV Input Type"
_old_id: "11"
_old_uri: "2.x/making-sites-with-modx/customizing-content/template-variables/adding-a-custom-tv-input-type"
---

**Only use this documentation for pre-2.2 or core submissions.**
Refer to the [Adding a Custom TV Type](making-sites-with-modx/customizing-content/template-variables/adding-a-custom-tv-type-modx-2.2 "Adding a Custom TV Type - MODX 2.2") doc for the proper way to build custom TVs in 2.2 which allows easy packaging.

## What are Custom TV Input Types?

MODx Revolution allows you to create your own custom TV input types (similar to the textbox, radio, textarea, richtext, etc types already available) for your [Template Variables](building-sites/elements/template-variables "Template Variables").

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

1. [Creating a Template Variable](building-sites/elements/template-variables/step-by-step)
2. [Bindings](building-sites/elements/template-variables/bindings)
3. [CHUNK Binding](building-sites/elements/template-variables/bindings/chunk-binding)
4. [DIRECTORY Binding](building-sites/elements/template-variables/bindings/directory-binding)
5. [EVAL Binding](building-sites/elements/template-variables/bindings/eval-binding)
6. [FILE Binding](building-sites/elements/template-variables/bindings/file-binding)
7. [INHERIT Binding](building-sites/elements/template-variables/bindings/inherit-binding)
8. [RESOURCE Binding](building-sites/elements/template-variables/bindings/resource-binding)
9. [SELECT Binding](building-sites/elements/template-variables/bindings/select-binding)
10. [Template Variable Input Types](building-sites/elements/template-variables/input-types)
11. [Template Variable Output Types](building-sites/elements/template-variables/output-types)
12. [Date TV Output Type](building-sites/elements/template-variables/output-types/date)
13. [Delimiter TV Output Type](building-sites/elements/template-variables/output-types/delimiter)
14. [HTML Tag TV Output Type](building-sites/elements/template-variables/output-types/html)
15. [Image TV Output Type](building-sites/elements/template-variables/output-types/image)
16. [URL TV Output Type](building-sites/elements/template-variables/output-types/url)
17. [Adding a Custom TV Type - MODX 2.2](extending-modx/custom-tvs)
18. [Adding a Custom TV Input Type](_legacy/making-sites-with-modx/adding-a-custom-tv-input-type)
19. [Adding a Custom TV Output Type](_legacy/making-sites-with-modx/adding-a-custom-tv-output-type)
20. [Creating a multi-select box for related pages in your template](building-sites/tutorials/multiselect-related-pages)
21. [Accessing Template Variable Values via the API](extending-modx/snippets/accessing-tvs)