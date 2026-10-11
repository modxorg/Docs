---
title: "modChunk.getContent"
translation: "extending-modx/core-model/modchunk/modchunk.getcontent"
description: "Получить исходный необработанный контент для чанка"
---

## modChunk::getContent

Получить исходный необработанный контент этого чанка. Имейте ввиду, что контент будет содержать необработанные теги, что делать с ними дальше можно почитать например здесь [Парсинг MODX тегов](extending-modx/parsing-tags)

## Синтаксис

``` php
string getContent ([array $options = array()])
```

Метод унаследован из `modElement` (`core/src/Revolution/modElement.php`), а не объявлен в modChunk. Для статического чанка метод читает исходный файл и, если он отличается от сохранённого контента, записывает его обратно через `save()`.

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
- [Парсинг MODX тегов](extending-modx/parsing-tags)
