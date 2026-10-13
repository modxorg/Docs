---
title: "modX.getResponse"
description: "Попробуйте загрузить класс обработчика ответа, если он еще не загружен."
translation: "extending-modx/modx-class/reference/modx.getresponse"
---

## modX::getResponse

Попробуйте загрузить класс обработчика ответа, если он еще не загружен. По умолчанию — `MODX\Revolution\modResponse`.

## Синтаксис

``` php
boolean getResponse ([string $class = MODX\Revolution\modResponse], [string $path = ''])
```

- `$class` _(string)_ Имя класса загружаемого обработчика ответа. Игнорируется, если задана системная настройка `modResponse.class` — настройка имеет приоритет.
- `$path` _(string)_ В `modX` не используется: класс определяется через автозагрузчик, путь не читается.

Возвращает `true`, если корректный объект обработчика ответа был загружен при этом или любом предыдущем вызове, иначе — `false`.

## Пример

``` php
$modx->response; // текущий экземпляр обработчика ответа
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
