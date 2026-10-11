---
title: "modResource.getCacheKey"
translation: "extending-modx/core-model/modresource/modresource.getcachekey"
description: "Построить ключ кэша ресурса для контекста"
---

## modResource::getCacheKey

Подставляет `[contextKey]` и `[id]` в шаблон `_cacheKey`, который конструктор задаёт как `[contextKey]/resources/[id]`.

При пустом `$context` берётся контекст запроса (`_contextKey`) с запасным вариантом в поле `context_key`. Если в шаблоне нет `[`, он возвращается без изменений.

## Синтаксис

``` php
string getCacheKey ([string $context = ''])
```

- `$context` _(string)_ ключ контекста, для которого строить ключ, по умолчанию `''`

## Пример

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$key = $resource->getCacheKey('web');
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.clearCache](extending-modx/core-model/modresource/modresource.clearcache)
