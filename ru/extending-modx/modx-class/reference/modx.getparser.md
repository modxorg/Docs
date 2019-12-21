---
title: "modX.getParser"
translation: "extending-modx/modx-class/reference/modx.getparser"
---

## modX::getParser

Возвращает MODX парсер.
Возвращает экземпляр `modParser`, ответственный за синтаксический анализ тегов в содержимом элемента, выполнение действий, возврат содержимого и/или отправку других ответов в процессе.

## Синтаксис

API Doc: [modX::getParser()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getParser())

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
