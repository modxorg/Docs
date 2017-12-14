---
title: "tagLister.tagLister.all"
_old_id: "1016"
_old_uri: "revo/taglister/taglister.taglister/taglister.taglister.all"
---

tagLister's all Chunk
---------------------

This is the Chunk displayed with the &all property on the [tagLister](/extras/revo/taglister/taglister.taglister "tagLister.tagLister") snippet.

Default Value
-------------

```
<pre class="brush: php">
<li class="[[+cls]]">
<a href="[[~[[+target]]? &[[+tagVar]]=``]]">[[+tag]]</a> ([[+count]])
</li>

```Available Placeholders
----------------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>tag</td><td>The text for the All Tags link.</td></tr><tr><td>tagVar</td><td>The REQUEST var specifying the tag param.</td></tr><tr><td>target</td><td>The target Resource ID to link to.</td></tr><tr><td>count</td><td>The number of Resources with tags.</td></tr><tr><td>cls</td><td>The CSS class to put on the LI tag.</td></tr></tbody></table>See Also
--------

1. [tagLister.getResourcesTag](/extras/revo/taglister/taglister.getresourcestag)
2. [tagLister.tagLister](/extras/revo/taglister/taglister.taglister)
  1. [tagLister.tagLister.all](/extras/revo/taglister/taglister.taglister/taglister.taglister.all)
  2. [tagLister.tagLister.tpl](/extras/revo/taglister/taglister.taglister/taglister.taglister.tpl)
3. [tagLister.tolinks](/extras/revo/taglister/taglister.tolinks)
  1. [tagLister.tolinks.tpl](/extras/revo/taglister/taglister.tolinks/taglister.tolinks.tpl)