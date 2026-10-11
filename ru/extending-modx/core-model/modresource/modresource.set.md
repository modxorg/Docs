---
title: "modResource.set"
translation: "extending-modx/core-model/modresource/modresource.set"
description: "Задать значение поля, попутно очистив alias"
---

## modResource::set

Задаёт значение поля по ключу или имени. Переопределение перехватывает ключ `alias` и сначала прогоняет значение через `cleanAlias()`, поэтому сохранённый alias всегда безопасен для URL. Все остальные ключи без изменений уходят в родительскую реализацию.

Возвращается `true` только если сохранённое значение действительно изменилось. Присвоение идентичного значения даёт `false`; то же самое — обращение к несуществующему полю, что также пишется в лог как ошибка.

## Синтаксис

``` php
boolean set ($k [, $v = null [, string $vType = '']])
```

- `$k` _(string)_ ключ или имя поля
- `$v` _(mixed)_ сохраняемое значение, по умолчанию `null`
- `$vType` _(string|callable)_ формат значения или вызываемая функция, заменяющая присваивание по умолчанию, по умолчанию `''`

## Пример

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$resource->set('alias', 'Hello World');
$resource->save();
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.cleanAlias](extending-modx/core-model/modresource/modresource.cleanalias)
