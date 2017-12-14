---
title: "modChunk.getContent"
_old_id: "1337"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modchunk/modchunk.getcontent"
---

modChunk::getContent
--------------------

Get the source content of this chunk.

Syntax
------

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modchunk.class.html#%5CmodChunk::getContent()](http://api.modx.com/revolution/2.2/db_core_model_modx_modchunk.class.html#%5CmodChunk::getContent())

```
<pre class="brush: php">
void getContent ([ $options = array()])

```Example
-------

```
<pre class="brush: php">
$chunk = $modx->getObject('modChunk',array('name' => 'MyChunk'));
if ($chunk) {
  $content = $chunk->getContent();
}

```See Also
--------

<table class="tableview" width="100%"><tr><td><span class="icon icon-page">Page:</span> [(at)CHUNK](/evolution/0.9.x/developers-guide/template-variables/(at)-binding/(at)chunk)</td></tr><tr><td><span class="icon icon-page">Page:</span> [(at)CHUNK](/evolution/1.0/developers-guide/template-variables/(at)-binding/(at)chunk)</td></tr><tr><td><span class="icon icon-page">Page:</span> [modChunk](/revolution/2.x/developing-in-modx/other-development-resources/class-reference/modchunk)</td></tr><tr><td><span class="icon icon-page">Page:</span> [modChunk.setContent](/revolution/2.x/developing-in-modx/other-development-resources/class-reference/modchunk/modchunk.setcontent)</td></tr><tr><td><span class="icon icon-page">Page:</span> [modChunk.getContent](/revolution/2.x/developing-in-modx/other-development-resources/class-reference/modchunk/modchunk.getcontent)</td></tr></table>