---
title: "modX.getParser"
description: "Возвращает MODX парсер."
translation: "extending-modx/modx-class/reference/modx.getparser"
---

## modX::getParser

Возвращает MODX парсер.
Возвращает экземпляр `modParser`, ответственный за синтаксический анализ тегов в содержимом элемента, выполнение действий, возврат содержимого и/или отправку других ответов в процессе.

## Синтаксис

``` php
object getParser()
```

## Пример

Получить объект парсера MODX.

``` php
$parser = $modx->getParser();
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
