---
title: "modChunk.setContent"
translation: "extending-modx/core-model/modchunk/modchunk.setcontent"
description: "Установить содержимое чанка"
---

## modChunk::setContent

Устанавливает содержимое этого чанка.

## Синтаксис

``` php
boolean setContent ($content [, array $options = array()])
```

Возвращает истину, если контент был установлен. Наследуется от `modElement` (`core/src/Revolution/modElement.php`).

## Пример

``` php
$chunk->setContent('<h2>Hello!</h2>');
```

## Смотрите также

- [modChunk](extending-modx/core-model/modchunk)
- [modChunk.getContent](extending-modx/core-model/modchunk/modchunk.getcontent)
