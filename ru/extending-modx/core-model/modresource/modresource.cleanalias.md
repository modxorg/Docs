---
title: "modResource.cleanAlias"
translation: "extending-modx/core-model/modresource/modresource.cleanalias"
description: "Превратить строку в допустимый сегмент URL"
---

## modResource::cleanAlias

Фильтрует строку до вида, пригодного для сегмента URL. Конфигурация контекста ресурса объединяется под `$options`. Затем `filterPathSegment()` класса ресурса применяет вырезание HTML, транслитерацию, ограничение символов, приведение к нижнему регистру, обрезку и ограничение длины.

Поведением управляют системные настройки `friendly_alias_*`, а `$options` переопределяет любую из них для данного вызова. `set()` использует метод всякий раз, когда присваивается поле `alias`.

## Синтаксис

``` php
string cleanAlias ($alias [, array $options = array()])
```

- `$alias` _(string)_ строка для фильтрации
- `$options` _(array)_ параметры фильтра, накладываемые поверх конфигурации контекста, по умолчанию `array()`

## Пример

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$alias = $resource->cleanAlias('Hello World');
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.set](extending-modx/core-model/modresource/modresource.set)
- [modResource.getAliasPath](extending-modx/core-model/modresource/modresource.getaliaspath)
