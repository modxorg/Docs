---
title: "modX.toPlaceholder"
translation: "extending-modx/modx-class/reference/modx.toplaceholder"
---

## modX::toPlaceholder

Рекурсивно проверяет и устанавливает плейсхолдеры, соответствующие типу передаваемого значения.

## Синтаксис

API Doc: [modX::toPlaceholder()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::toPlaceholder())

``` php
array toPlaceholder (string $key, mixed $value, [string $prefix = ''], [string $separator = '.'], [boolean $restore = false])
```

## Пример

Установите плейсхолдер и добавьте префикс "my". Возвращает многомерный массив массива, содержащий до двух элементов: «keys», который всегда содержит массив ключей-плейсхолдеров, которые были установлены, и при необходимости, если для параметра restore задано значение true, «restore», содержащий массив значений-плейсхолдеров, которые были перезаписаны по методу.

``` php
$modx->toPlaceholder('name','John','my');
```

## Смотрите также

- [modX.toPlaceholders](extending-modx/modx-class/reference/modx.toplaceholders "modX.toPlaceholders")
- [modX.setPlaceholder](extending-modx/modx-class/reference/modx.setplaceholder "modX.setPlaceholder")
- [modX.setPlaceholders](extending-modx/modx-class/reference/modx.setplaceholders "modX.setPlaceholders")
- [modX.getPlaceholder](extending-modx/modx-class/reference/modx.getplaceholder "modX.getPlaceholder")
