---
title: "modX.paramValueIsTrue"
translation: "extending-modx/modx-class/reference/modx.paramvalueistrue"
description: "Прочитать параметр и понять, считается ли его значение истиной"
---

## modX::paramValueIsTrue

Читает `$params[$key]` и принимает только `true`, `'true'`, `1` и `'1'`. Всё остальное считается ложью, включая отсутствующий ключ, `'TRUE'`, `'on'` и `'yes'`.

Используйте `$returnBoolAsString`, когда результат попадает в генерируемый код: JavaScript, собранный через nowdoc или heredoc, не принимает литерал boolean PHP.

## Синтаксис

``` php
bool paramValueIsTrue (array $params, string|int $key, [bool $returnBoolAsString = false])
```

- `$params` _(array)_ параметры для чтения
- `$key` _(string|int)_ ключ для проверки
- `$returnBoolAsString` _(bool)_ вернуть `'true'` или `'false'` вместо boolean, по умолчанию `false`

## Пример

``` php
$props = array('grow' => 'true', 'resize' => '0');

$grow = $modx->paramValueIsTrue($props, 'grow');        // true
$resize = $modx->paramValueIsTrue($props, 'resize');    // false
$flag = $modx->paramValueIsTrue($props, 'grow', true);  // 'true'
```

## Смотрите также

- [modX](extending-modx/core-model/modx)
