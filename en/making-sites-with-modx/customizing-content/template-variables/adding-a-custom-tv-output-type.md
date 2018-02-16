---
title: "Adding a Custom TV Output Type"
_old_id: "12"
_old_uri: "2.x/making-sites-with-modx/customizing-content/template-variables/adding-a-custom-tv-output-type"
---

<div class="warning">**Only use this documentation for pre-2.2 or core submissions.**  
Refer to the [Adding a Custom TV Type](making-sites-with-modx/customizing-content/template-variables/adding-a-custom-tv-type-modx-2.2 "Adding a Custom TV Type - MODX 2.2") doc for the proper way to build custom TVs in 2.2 which allows easy packaging.</div><div>- [What are TV Output Types?](#AddingaCustomTVOutputType-WhatareTVOutputTypes%3F)
- [Creating the Files](#AddingaCustomTVOutputType-CreatingtheFiles)
  - [Setting up the Input Properties Controller](#AddingaCustomTVOutputType-SettinguptheInputPropertiesController)
  - [Setting up the Input Properties Template](#AddingaCustomTVOutputType-SettinguptheInputPropertiesTemplate)
  - [Setting up the Output Controller](#AddingaCustomTVOutputType-SettinguptheOutputController)
- [Using the Custom TV Output Type](#AddingaCustomTVOutputType-UsingtheCustomTVOutputType)
- [See Also](#AddingaCustomTVOutputType-SeeAlso)

</div>What are TV Output Types?
-------------------------

TV Output Types allow you to output [Template Variables](making-sites-with-modx/customizing-content/template-variables "Template Variables") in different markup and formats. Some examples include outputting a TV value as an image, URL, HTML tag, date, etc.

MODx Revolution lets you create custom output types fairly easily.

Creating the Files
------------------

Let's create a custom TV Output Type called "button". This will render an input button (or more than one) with a specified value and an optional name, with some other fields for attributes. You'll need 3 files:

- An input properties controller - put here: core/model/modx/processors/element/tv/renders/mgr/properties/button.php
- An input properties template - put here: manager/templates/default/element/tv/renders/properties/button.tpl
- An output controller - put here: core/model/modx/processors/element/tv/renders/web/output/button.php

### Setting up the Input Properties Controller

This is the PHP file that will load the mgr template for managing the TV output type's properties. We'll have it contain just this:

```
<pre class="brush: php">
<?php
// any custom php you want to run here
return $modx->smarty->fetch('element/tv/renders/properties/button.tpl');

```### Setting up the Input Properties Template

This is the template for the default manager theme to render properties with. We'll use ExtJS to render some pretty form fields:

```
<pre class="brush: php">
<div id="tv-wprops-form{$tv}"></div>
{literal}
<script type="text/javascript">
// <![CDATA[
var params = {
{/literal}{foreach from=$params key=k item=v name='p'}
 '{$k}': '{$v}'{if NOT $smarty.foreach.p.last},{/if}
{/foreach}{literal}
};
var oc = {'change':{fn:function(){Ext.getCmp('modx-panel-tv').markDirty();},scope:this}};
MODx.load({
    xtype: 'panel'
    ,layout: 'form'
    ,autoHeight: true
    ,labelWidth: 150
    ,border: false
    ,items: [{
        xtype: 'textfield'
        ,fieldLabel: _('class')
        ,name: 'prop_class'
        ,id: 'prop_class{/literal}{$tv}{literal}'
        ,value: params['class'] || ''
        ,width: 300
        ,listeners: oc
    },{
        xtype: 'textfield'
        ,fieldLabel: _('id')
        ,name: 'prop_id'
        ,id: 'prop_id{/literal}{$tv}{literal}'
        ,value: params['id'] || ''
        ,width: 300
        ,listeners: oc
    },{
        xtype: 'textfield'
        ,fieldLabel: _('style')
        ,name: 'prop_style'
        ,id: 'prop_style{/literal}{$tv}{literal}'
        ,value: params['style'] || ''
        ,width: 300
        ,listeners: oc
    },{
        xtype: 'textfield'
        ,fieldLabel: _('attributes')
        ,name: 'prop_attributes'
        ,id: 'prop_attributes{/literal}{$tv}{literal}'
        ,value: params['attributes'] || ''
        ,width: 300
        ,listeners: oc
    }]
    ,renderTo: 'tv-wprops-form{/literal}{$tv}{literal}'
});
// ]]>
</script>
{/literal}

```The key way these save is that each field is prepended with 'prop\_' in its name. This tells MODx to save this field in the TV's output properties. Make sure you specify your fields with this prefix!

<div class="note">You don't have to use ExtJS, however - you can use just straight HTML - it's totally up to you.   
Note that if you created another manager theme, you'd have to create a properties tpl for that theme as well.</div>### Setting up the Output Controller

Now we get into the good stuff. This controller will handle exactly how the button is outputted. Our file looks like this (comments inline):

```
<pre class="brush: php">
<?php
$o= '';
$buttons= $this->parseInput($value, '||', 'array');
/* allow multiple buttons separated by ||, or checkbox/multiple input tvs */
foreach ($buttons as $button) {
    if (!is_array($button)) {
        $button= explode('==', $button);
    }
    /* the TV value must have a value of either: text or text==name */
    $text = $button[0];
    if (!empty($text)) {
        $attributes = '';
        $attr = array(
            'class' => $params['class'],
            'id' => ($params['id'] ? $params['id'] : ''),
            'alt' => htmlspecialchars($params['alttext']),
            'style' => $params['style']
        );
        /* if a name is specified, use it! */
        if (!empty($button[1])) $attr['name'] = $button[1];

        /* separate the attributes into html tag format */
        foreach ($attr as $k => $v) $attributes.= ($v ? ' '.$k.'="'.$v.'"' : '');
        $attributes .= ' '.$params['attrib'];

        /* Output the image with attributes */
        $o .= '<button'.rtrim($attributes).'>'.$text.'</button>'."\n";
    }
}

return $o;

```Using the Custom TV Output Type
-------------------------------

So, how does it look? Well, it should render an output form like this when editing the TV - I've added some custom values to it as well:

![](/download/attachments/18678064/outtvprop1.png?version=1&modificationDate=1269529790000)

So we'll save this, and then let's go edit in in a Resource. We'll specify two buttons, separating with ||. We could also just do one button. And, we'll have the first button have a custom 'name' attribute as well:

![](/download/attachments/18678064/outtvinput.png?version=1&modificationDate=1269529790000)

Great. Now let's preview the resource, and we'll get an output like this:

![](/download/attachments/18678064/outtvresult1.png?version=1&modificationDate=1269529790000)

And we can examine the HTML source:

![](/download/attachments/18678064/outtvsource1.png?version=1&modificationDate=1269529790000)

And there you go! A custom TV output type!

See Also
--------

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