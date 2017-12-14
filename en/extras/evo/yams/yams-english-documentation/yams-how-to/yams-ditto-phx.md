---
title: "YAMS + Ditto + PHx"
_old_id: "1683"
_old_uri: "evo/yams/yams-english-documentation/yams-how-to/yams-ditto-phx"
---

<div class="error"><span class="error">Unknown macro: {div}</span>![](/images/icons/emoticons/information.gif)**Language Variants**

<table class="tableview" width="100%"><tr><td><span class="icon icon-page">Page:</span> [YAMS + Ditto + PHx](/extras/evo/yams/yams-english-documentation/yams-how-to/yams-ditto-phx)</td></tr></table></div>How can I use PHx and YAMS placeholders within Ditto templates?
===============================================================

First make sure that you have the PHx plugin installed and that its events are set to activate AFTER YAMS. Then, following [thomasd's instructions](http://modxcms.com/forums/index.php/topic,44801.msg278694.html#msg278694), we do the following:

Turn off Ditto PHx-Substitution via `&phx=`0``. Now no PHx is done so you have to modify your PHx-tags.

For Example:

```
<pre class="brush: php">
[+content:striptags+]

```should be changed to:

```
<pre class="brush: php">
[*phx:input=`((yams_data:[+id+]:content_(yams_id)))`:striptags*]

```Now the parsing order is correct:   
1\. Ditto replaces the `[+id+]`-placeholder with the current id   
2\. YAMS replaces the `((..))`-construct with the actual content   
3\. PHx executes the striptags-function and outputs the modified content

For non-multilingual fields like an image-field use:

```
<pre class="brush: php">
[*phx:input=`[+image+]`:phpthumb=`73x110`*]

```That forces PHx to parse the Ditto-Placeholder.

The final Ditto call may look like this:

```
<pre class="brush: php">
[[Ditto? &parents=`[*id*]` &tpl=`@FILE:assets/templates/list-item.html` &noResults=`Keine Einträge vorhanden` &phx=`0`]]

```