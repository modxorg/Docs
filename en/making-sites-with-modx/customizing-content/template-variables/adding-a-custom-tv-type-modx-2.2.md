---
title: "Adding a Custom TV Type - MODX 2.2"
_old_id: "1047"
_old_uri: "2.x/making-sites-with-modx/customizing-content/template-variables/adding-a-custom-tv-type-modx-2.2"
---

This tutorial is for MODX Revolution 2.2 or greater. 

## What are Custom TV Input Types? 

MODx Revolution allows you to create your own custom TV input types (similar to the textbox, radio, textarea, richtext, etc types already available) for your [Template Variables](making-sites-with-modx/customizing-content/template-variables "Template Variables"). This tutorial will show a very simple example by loading a simple Template dropdown for us in the mgr, and then in the frontend will render our Template ID wrapped in a special div. We'll call it "TemplateSelect". We'll also make this an Extra called "OurTVs", meaning that we'll have the files outside of the normal TV input renders directory, and put it in our own Extra's directory in core/components/ourtvs/.

## Create a Namespace 

If you haven't already, go ahead and create a Namespace called "ourtvs" with the path "{core\_path}components/ourtvs/". This will help us later on.

## Creating the Pathing Plugin 

We'll need a plugin to tell MODX where our custom TV directories are. Go ahead and make a plugin called "OurTvsPlugin", and assign it to the following events:

- _OnTVInputRenderList_ - For rendering the actual TV input in the backend
- _OnTVOutputRenderList_ - For rendering the TV output in the frontend
- _OnTVInputPropertiesList_ - For loading any custom properties for the input render in the manager
- _OnTVOutputRenderPropertiesList_ - For loading any custom properties for the output render (front-end) of the TV
- _OnDocFormPrerender_ - For loading any custom JS/CSS for our TV

Now put in the Plugin code:

```
<pre class="brush: php">
$corePath = $modx->getOption('core_path',null,MODX_CORE_PATH).'components/ourtvs/';
switch ($modx->event->name) {
    case 'OnTVInputRenderList':
        $modx->event->output($corePath.'tv/input/');
        break;
    case 'OnTVOutputRenderList':
        $modx->event->output($corePath.'tv/output/');
        break;
    case 'OnTVInputPropertiesList':
        $modx->event->output($corePath.'tv/inputoptions/');
        break;
    case 'OnTVOutputRenderPropertiesList':
        $modx->event->output($corePath.'tv/properties/');
        break;
    case 'OnManagerPageBeforeRender':
        break;
}

```These event handlers tell MODX to check these directories for our TV files when doing all the rendering and processing. Think of it like adding library or include paths.

The pathing plugin will not be required in MODX 2.3; the Namespace will handle all the pathing. This is why we told you earlier to make the Namespace. :) 

## Creating the Input Controller 

The input controller is what actually loads the markup for the custom TV input. Create the input controller file here:

> core/components/ourtvs/tv/input/templateselect.class.php

And inside, you can put this code:

```
<pre class="brush: php">
<?php
if(!class_exists('TemplateSelectInputRender')) {
    class TemplateSelectInputRender extends modTemplateVarInputRender {
        public function getTemplate() {
            return $this->modx->getOption('core_path').'components/ourtvs/tv/input/tpl/templateselect.tpl';
        }
        public function process($value,array $params = array()) {
        }
    }
}
return 'TemplateSelectInputRender';

```Here we tell it where to find our smarty template for rendering the TV, as well as having a process() method to do any business logic we want to do prior to rendering the TV.

Now you can see here we are specifying a "tpl" file for rendering our TV. Go ahead and put it here:

> core/components/ourtvs/tv/input/tpl/templateselect.tpl

And make its content:

```
<pre class="brush: php">
<select id="tv{$tv->id}" name="tv{$tv->id}" class="combobox"></select>
<script type="text/javascript">
// <![CDATA[
{literal}
MODx.load({
{/literal}
    xtype: 'modx-combo-template'
    ,name: 'tv{$tv->id}'
    ,hiddenName: 'tv{$tv->id}'
    ,transform: 'tv{$tv->id}'
    ,id: 'tv{$tv->id}'
    ,width: 300
    ,value: '{$tv->value}'
{literal}
    ,listeners: { 'select': { fn:MODx.fireResourceFormChange, scope:this}}
});
{/literal}
// ]]>
</script>

```You don't have to use the ExtJS code as shown here to have a custom input type. It could even just be a straight HTML input. It's really up to you. 

And that should render us a nice template dropdown in the backend:

![](/download/attachments/39354478/ctv1.png?version=1&modificationDate=1334932146000)

## Creating the Output Controller 

Okay, so now we want to make the output controller, let's create the file at:

> core/components/ourtvs/tv/output/templateselect.class.php

And the content:

```
<pre class="brush: php">
if(!class_exists('TemplateSelectOutputRender')) {
    class TemplateSelectOutputRender extends modTemplateVarOutputRender {
        public function process($value,array $params = array()) {
            return '<div class="template">'.$value.'</div>';
        }
    }
}
return 'TemplateSelectOutputRender';

```There we go - now when we render this in the front-end, it will display the ID of our selected Template wrapped in a div.

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