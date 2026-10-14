---
title: "modX.getRequest"
description: "Попробуйте загрузить класс обработчика запросов, если он еще не загружен."
translation: "extending-modx/modx-class/reference/modx.getrequest"
---

## modX::getRequest

Попробуйте загрузить класс обработчика запросов, если он еще не загружен. По умолчанию — `MODX\Revolution\modRequest`.

## Синтаксис

``` php
boolean getRequest ([string $class = MODX\Revolution\modRequest], [string $path = ''])
```

- `$class` _(string)_ Имя класса загружаемого обработчика запросов. Игнорируется, если задана системная настройка `modRequest.class` — настройка имеет приоритет.
- `$path` _(string)_ В `modX` не используется: класс определяется через автозагрузчик, путь не читается.

Возвращает `true`, если корректный объект обработчика запросов был загружен при этом или любом предыдущем вызове, иначе — `false`.

## Пример

``` php
$modx->request; // текущий обработчик запросов, в менеджере это экземпляр MODX\Revolution\modManagerRequest
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
