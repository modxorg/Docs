---
title: "Loading Pages with jQuery Tabs"
_old_id: "172"
_old_uri: "2.x/case-studies-and-tutorials/loading-pages-in-the-front-end-via-ajax-and-jquery-tabs"
---

## The Problem

 We want in our site to use [jQuery's tabs](http://jqueryui.com/demos/tabs/) to load our Resources via AJAX. How do we do that in MODx? This tutorial will show you just how easy it is to accomplish this in MODX Revolution.

## Creating the Resources

 In the Resources you want to load via the tabs, you'll need to just create all your Resources with the Template being **blank** (or a minimal template with only the things you want inside the tabs). This will make sure that we're not loading anything besides the wanted material - you wouldn't want to load your whole page header and footer into each tab!

## Doing the Front-End Loading

 Now we'll use jQuery's fun tabs() command to create the front-end loading system. The code would look something like this (pulled from jquery UI's docs):

 ``` php
<script type="text/javascript">
$(function() { $("#tabs").tabs(); });
</script>
<div id="tabs">
  <ul>
    <li><a href="[[~92]]">Resource with ID 92</a></li>
    <li><a href="[[~546]]">Resource with ID 546</a></li>
    <li><a href="[[~123]]">Resource with ID 123</a></li>
  </ul>
</div>
```

 Great! So this loads the pages via Ajax.

## Wait, I want the Page Titles as the tab headers!

 There are a few ways you can do this; one, you can use [getResources](/extras/getresources "getResources"), [Wayfinder](/extras/evo/wayfinder "Wayfinder"), or use a getField snippet.

### Using getResources

 For getResources, make sure you use the 'tpl' property, which you can create as a Chunk named 'myRowTpl' (or whatever you want), looks like this:

 ``` php
<li id="[[+id]]"><a href="[[~[[+id]]]]" title="[[+longtitle]]">[[+pagetitle]]</a></li>
```

 and in our tabs page:

 ``` php
<script type="text/javascript">
$(function() { $("#tabs").tabs(); });
</script>
<div id="tabs">
  <ul>
    [[getResources? &parents=`123` &depth=`1` &tpl=`myRowTpl` &includeContent=`1` &includeTVs=`1`]]
  </ul>
</div>
```

### Using Wayfinder

 For Wayfinder, make sure your rowTpl template, which you can create as a Chunk named 'myRowTpl' (or whatever you want), looks like this:

 ``` php
<li[[+wf.id]][[+wf.classes]]><a href="[[+wf.link]]" title="[[+wf.title]]">[[+wf.linktext]]</a></li>
```

 and in our tabs page:

 ``` php
<script type="text/javascript">
$(function() { $("#tabs").tabs(); });
</script>
<div id="tabs">
  <ul>
    [[Wayfinder? &startId=`123` &level=`1` &rowTpl=`myRowTpl`]]
  </ul>
</div>
```

### Using a getField Snippet

 Or, you can use a Snippet such as this one to grab the pagetitle:

 ``` php
<?php
/**
 * Grabs a field for a specified Resource
 */
/* setup some default properties */
$id = $modx->getOption('id',$scriptProperties,false);
$field = $modx->getOption('field',$scriptProperties,'pagetitle');
if ($id) { /* grab the resource object */
    $resource = $modx->getObject('modResource',$id);
    if ($resource == null) return '';
} else { /* if no id specified, use current doc */
    $resource =& $modx->resource;
}
/* return the field value */
return $resource->get($field);
?>
```

 Call this Snippet getField like so in our tabs page:

 ``` php
<script type="text/javascript">
$(function() { $("#tabs").tabs(); });
</script>
<div id="tabs">
  <ul>
    <li><a href="[[~92]]">[[getField? &id=`92` &field=`pagetitle`]]</a></li>
    <li><a href="[[~546]]">[[getField? &id=`546` &field=`pagetitle`]]</a></li>
    <li><a href="[[~123]]">[[getField? &id=`123` &field=`pagetitle`]]</a></li>
  </ul>
</div>
```

 However, the getField solution is not as fast or elegant as the Wayfinder solution, since it has to make a query every tab.

### Using FastField or pdoTools

 pdoTools includes the FastField extended parser to provide a new field-fetching MODX tag using a "#" identifier, so they both work the same way.

 ``` php
<script type="text/javascript">
$(function() { $("#tabs").tabs(); });
</script>
<div id="tabs">
  <ul>
    <li><a href="[[~92]]">[[#92.pagetitle]]</a></li>
    <li><a href="[[~546]]">[[#546.pagetitle]]</a></li>
    <li><a href="[[~123]]">[[#123.pagetitle]]</a></li>
  </ul>
</div>
```

## Conclusion

 Note that all you're doing is pointing the href tags to the actual document IDs, just like a normal link. The trick is you're making your Template for the Documents be blank (or minimal) so that it only loads the parsed content itself.

 This will successfully load your MODX Resources into jQuery tabs.
