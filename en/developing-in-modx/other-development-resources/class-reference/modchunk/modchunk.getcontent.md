---
title: "modChunk.getContent"
_old_id: "1337"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modchunk/modchunk.getcontent"
---

## modChunk::getContent

Get the source content of this chunk.

## Syntax

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modchunk.class.html#%5CmodChunk::getContent()](http://api.modx.com/revolution/2.2/db_core_model_modx_modchunk.class.html#%5CmodChunk::getContent())

``` php 
void getContent ([ $options = array()])
```

## Example

``` php 
$chunk = $modx->getObject('modChunk',array('name' => 'MyChunk'));
if ($chunk) {
  $content = $chunk->getContent();
}
```

## See Also

Page: [(at)CHUNK](/evolution/0.9.x/developers-guide/template-variables/(at)-binding/(at)chunk)Page: [(at)CHUNK](/evolution/1.0/developers-guide/template-variables/(at)-binding/(at)chunk)Page: [modChunk](developing-in-modx/other-development-resources/class-reference/modchunk)Page: [modChunk.setContent](developing-in-modx/other-development-resources/class-reference/modchunk/modchunk.setcontent)Page: [modChunk.getContent](developing-in-modx/other-development-resources/class-reference/modchunk/modchunk.getcontent)