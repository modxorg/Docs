---
title: "YAMS + Wayfinder"
_old_id: "1687"
_old_uri: "evo/yams/yams-english-documentation/yams-how-to/yams-wayfinder"
---

<div class="error"><span class="error">Unknown macro: {div}</span>![](/images/icons/emoticons/information.gif)**Language Variants**

<table class="tableview" width="100%"><tr><td><span class="icon icon-page">Page:</span> [YAMS + Wayfinder](/extras/evo/yams/yams-english-documentation/yams-how-to/yams-wayfinder)</td></tr></table></div>How can Wayfinder be made to work with YAMS?
============================================

Standard Wayfinder Templates
----------------------------

Multilingual versions of the default Wayfinder templates are available, which will display the output in the correct language for the current page. To reproduce the default Wayfinder behaviour the following multilingual template parameter must be added to the Wayfinder call:

```
<pre class="brush: php">
&rowTpl=`@FILE:assets/modules/yams/tpl/wayfinder/docr/row.tpl`

```The Wayfinder &useWeblinkUrl parameter will not do anything when using the YAMS Wayfinder templates. To avoid resolving weblinks, or to improve efficiency of the Wayfinder call when not using weblinks, it is necessary to use the doc version of the template instead:

```
<pre class="brush: php">
&rowTpl=`@FILE:assets/modules/yams/tpl/wayfinder/doc/row.tpl`

```When setting the &displayStart parameter to TRUE, it will also be necessary to add the following parameter to the Wayfinder call:

```
<pre class="brush: php">
&startItemTpl=`@FILE:assets/modules/yams/tpl/wayfinder/mode/startitem.tpl`

```where mode is doc or docr.

The full list of multilingual Wayfinder templates available are as follows:

```
<pre class="brush: php">
&rowTpl=`@FILE:assets/modules/yams/tpl/wayfinder/mode/row.tpl` &parentRowHereTpl=`@FILE:assets/modules/yams/tpl/wayfinder/mode/parentrowhere.tpl` &parentRowTpl=`@FILE:assets/modules/yams/tpl/wayfinder/mode/parentrow.tpl` &hereTpl=`@FILE:assets/modules/yams/tpl/wayfinder/mode/here.tpl` &innerRowTpl=`@FILE:assets/modules/yams/tpl/wayfinder/mode/innerrow.tpl` &innerHereTpl=`@FILE:assets/modules/yams/tpl/wayfinder/mode/innerhere.tpl` &activeParentRowTpl=`@FILE:assets/modules/yams/tpl/wayfinder/mode/activeparentrow.tpl` &categoryFoldersTpl=`@FILE:assets/modules/yams/tpl/wayfinder/mode/categoryfolders.tpl` &startItemTpl=`@FILE:assets/modules/yams/tpl/wayfinder/mode/startitem.tpl`

```where once again, mode is doc or docr.

<a name="YAMS%2BWayfinder-CustomTemplates"></a>Custom Wayfinder Templates
-------------------------------------------------------------------------

Custom Wayfinder templates need to be modified to generate multilingual output. This can be done by making the following replacements:

1. ```
  <pre class="brush: php">
  [+wf.link+]
  
  ```should be replaced by
  
  ```
  <pre class="brush: php">
  (yams_docr:[+wf.docid+])
  
  ```This will ensure that multilingual URLs are used and will resolve all weblink URLs to their final destination. If weblink URLs should be output directly rather than being resolved, then (yams\_doc:\[+wf.docid+\]) can be used instead.
2. ```
  <pre class="brush: php">
  [+wf.title+]
  
  ```should be replaced by
  
  ```
  <pre class="brush: php">
  [[YAMS? &get=`data` &from=`pagetitle` &docid=`[+wf.docid+]`]]
  
  ```This will output the correct pagetitle language variant for the hover text of the menu links. pagetitle can be replaced by menutitle, longtitle or any of the other standard document variable fields.
3. ```
  <pre class="brush: php">
  [+wf.linktext+]
  
  ```should be replaced by
  
  ```
  <pre class="brush: php">
  [[YAMS? &get=`data` &from=`menutitle` &docid=`[+wf.docid+]`]]
  
  ```This will output the correct menutitle language variant for the text of the menu links. menutitle can be replaced by pagetitle, longtitle or any of the other standard document variable fields.