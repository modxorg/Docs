---
title: "modX.getConfig"
description: "Получение конфигурации для сайта."
translation: "extending-modx/modx-class/reference/modx.getconfig"
---

## modX::getConfig

Получение конфигурации для сайта.

## Синтаксис

``` php
array|null getConfig ()
```

Возвращает конфигурацию в виде ассоциативного массива или `null`, если основную конфигурацию не удалось загрузить (это также пишется в лог как фатальная ошибка).

## Пример

Получить конфигурацию сайта в массив.

``` php
$config = $modx->getConfig();
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
