---
title: "YAMS Language Flag List"
_old_id: "747"
_old_uri: "evo/yams/yams-english-documentation/yams-how-to/yams-language-flag-list"
---

<div class="error"><span class="error">Unknown macro: {div}</span>![](/images/icons/emoticons/information.gif)**Language Variants**

<table class="tableview" width="100%"><tr><td><span class="icon icon-page">Page:</span> [YAMS Language Flag List](/extras/evo/yams/yams-english-documentation/yams-how-to/yams-language-flag-list)</td></tr></table></div>How can I create a linked list of flags pointing to different language versions?
================================================================================

Use a YAMS repeat call to loop over all languages and output the flag list:

```
<pre class="brush: php">
[[YAMS? &get=`repeat` &beforetpl=`@CODE:<ul>` &repeattpl=`otherFlagItemTpl` &currenttpl=`currentFlagItemTpl` &aftertpl=`@CODE:</ul>`]]

```Here otherFlagItemTpl is a chunk that contains a linked flag image:

```
<pre class="brush: php">
<li class="yams_lang_(yams_id)"><a href="(yams_docr)" lang="(yams_tag)" xml:lang="(yams_tag)" dir="(yams_dir)" title="(yams_name_in_(yams_id+))"><img alt="(yams_name)" src="[(site_url)]assets/images/flags/(yams_id).png"/></a></li>

```and currentFlagItemTpl is a chunk that contains an unlinked flag image:

```
<pre class="brush: php">
<li class="yams_lang_(yams_id) yams_current"><img alt="(yams_name)" src="[(site_url)]assets/images/flags/(yams_id).png"/></li>

```Flag images with the filename format (yams\_id).png should be placed in the directory assets/images/flags/.