---
title: "modChunk.getContent"
translation: "extending-modx/core-model/modchunk/modchunk.getcontent"
description: "Получить исходный необработанный контент для чанка"
---

## modChunk::getContent

Получить исходный необработанный контент этого чанка. Имейте ввиду, что контент будет содержать необработанные теги, что делать с ними дальше можно почитать например здесь [Парсинг MODX тегов](extending-modx/parsing-tags)

## Синтаксис

API документация: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modchunk.class.html#%5CmodChunk::getContent()](http://api.modx.com/revolution/2.2/db_core_model_modx_modchunk.class.html#%5CmodChunk::getContent())

``` php
void getContent ([ $options = array()])
```

## Пример

``` php
$chunk = $modx->getObject('modChunk',array('name' => 'MyChunk'));
if ($chunk) {
  $content = $chunk->getContent();
}
```

## Смотрите также

- [modChunk](extending-modx/core-model/modchunk)
- [modChunk.setContent](extending-modx/core-model/modchunk/modchunk.setcontent)
- [modChunk.getContent](extending-modx/core-model/modchunk/modchunk.getcontent)
- [Парсинг MODX тегов](extending-modx/parsing-tags)
