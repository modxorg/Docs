---
title: "modX.unsetPlaceholders"
translation: "extending-modx/modx-class/reference/modx.unsetplaceholders"
---

## modX::unsetPlaceholders

Удаляет несколько плейсхолдеров по префиксу или массиву ключей.

## Синтаксис

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::unsetPlaceholders()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::unsetPlaceholders())

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
