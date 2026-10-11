---
title: "modX.findResource"
translation: "extending-modx/modx-class/reference/modx.findresource"
description: "Определить ID ресурса по URI в контексте"
---

## modX::findResource

Определяет URI ресурса или его алиас по числовому ID неудалённого ресурса в указанном контексте. Возвращает `false`, если совпадений нет. Поиск не проверяет поле `published`.

При включённом `cache_alias_map` URI ищется в кэшированной карте алиасов, иначе — в базе данных.

## Синтаксис

``` php
integer|false findResource (string $uri, [string $context = ''])
```

- `$uri` _(string)_ искомый URI. Пустое значение отклоняется, строка `'0'` принимается явно.
- `$context` _(string)_ ключ контекста для поиска. По умолчанию текущий контекст.

## Пример

``` php
$id = $modx->findResource('about-us', 'web');
if ($id !== false) {
    echo $id;
}
```

## Смотрите также

- [modX](extending-modx/core-model/modx)
- [modX.makeUrl](extending-modx/modx-class/reference/modx.makeurl)
