---
title: "Custom Template Variables"
_old_id: "1047"
_old_uri: "2.x/making-sites-with-modx/customizing-content/template-variables/adding-a-custom-tv-type-modx-2.2"
---

This tutorial is for MODX Revolution 2.2 or greater.

## What are Custom TV Input Types?

MODX Revolution allows you to create your own custom TV input types (similar to the textbox, radio, textarea, richtext, etc types already available) for your [Template Variables](building-sites/elements/template-variables "Template Variables"). This tutorial will show a very simple example by loading a simple Template dropdown for us in the mgr, and then in the frontend will render our Template ID wrapped in a special div. We'll call it "TemplateSelect". We'll also make this an Extra called "OurTVs", meaning that we'll have the files outside of the normal TV input renders directory, and put it in our own Extra's directory in core/components/ourtvs/.

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

``` php
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
```

These event handlers tell MODX to check these directories for our TV files when doing all the rendering and processing. Think of it like adding library or include paths.

The pathing plugin will not be required in MODX 2.3; the Namespace will handle all the pathing. This is why we told you earlier to make the Namespace. :)

## Creating the Input Controller

The input controller is what actually loads the markup for the custom TV input. Create the input controller file here:

> core/components/ourtvs/tv/input/templateselect.class.php

And inside, you can put this code:

``` php
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
```

Here we tell it where to find our smarty template for rendering the TV, as well as having a process() method to do any business logic we want to do prior to rendering the TV.

Now you can see here we are specifying a "tpl" file for rendering our TV. Go ahead and put it here:

> core/components/ourtvs/tv/input/tpl/templateselect.tpl

And make its content:

``` javascript
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
```

You don't have to use the ExtJS code as shown here to have a custom input type. It could even just be a straight HTML input. It's really up to you. Most importantly, your input type should have a name of `tv{$tv->id}`.

And that should render us a nice template dropdown in the backend:

![](/download/attachments/39354478/ctv1.png?version=1&modificationDate=1334932146000)

## Creating the Output Controller

Okay, so now we want to make the output controller, let's create the file at:

> core/components/ourtvs/tv/output/templateselect.class.php

And the content:

``` php
if(!class_exists('TemplateSelectOutputRender')) {
    class TemplateSelectOutputRender extends modTemplateVarOutputRender {
        public function process($value,array $params = array()) {
            return '<div class="template">'.$value.'</div>';
        }
    }
}
return 'TemplateSelectOutputRender';
```

There we go - now when we render this in the front-end, it will display the ID of our selected Template wrapped in a div.

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
