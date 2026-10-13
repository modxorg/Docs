---
title: "modX.unsetPlaceholders"
description: "Удаляет несколько плейсхолдеров по префиксу или массиву ключей."
translation: "extending-modx/modx-class/reference/modx.unsetplaceholders"
---

## modX::unsetPlaceholders

Удаляет несколько плейсхолдеров по префиксу или массиву ключей.

## Синтаксис

``` php
void unsetPlaceholders (string|array $keys)
```

## Пример

Отмените плейсхолдеры my.name и my.email.

``` php
$modx->unsetPlaceholders(array('my.name','my.email'));
```

Сбросьте все плейсхолдеров с префиксом «my».

``` php
$modx->unsetPlaceholders('my.');
```

## Смотрите также

- [modX.unsetPlaceholder](extending-modx/modx-class/reference/modx.unsetplaceholder "modX.unsetPlaceholder")
- [modX.setPlaceholder](extending-modx/modx-class/reference/modx.setplaceholder "modX.setPlaceholder")
- [modX.setPlaceholders](extending-modx/modx-class/reference/modx.setplaceholders "modX.setPlaceholders")
- [modX.toPlaceholder](extending-modx/modx-class/reference/modx.toplaceholder "modX.toPlaceholder")
- [modX.toPlaceholders](extending-modx/modx-class/reference/modx.toplaceholders "modX.toPlaceholders")
