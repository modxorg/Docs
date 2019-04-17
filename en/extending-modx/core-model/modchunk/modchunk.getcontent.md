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

- [modChunk](extending-modx/core-model/modchunk)
- [modChunk.setContent](extending-modx/core-model/modchunk/modchunk.setcontent)
- [modChunk.getContent](extending-modx/core-model/modchunk/modchunk.getcontent)
