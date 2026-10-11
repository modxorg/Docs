---
title: "modResource.clearCache"
translation: "extending-modx/core-model/modresource/modresource.clearcache"
description: "Удалить закэшированные копии одного ресурса"
---

## modResource.clearCache

Удаляет записи кэша этого ресурса из провайдера кэша `resource` для указанного или текущего контекста: запись верхнего уровня и запись ресурса. После этого при работе под `modX` вызывается `OnResourceCacheUpdate` с ID ресурса.

Ядро никогда не вызывает этот метод — процессоры менеджера вместо этого обновляют весь кэш ресурсов контекста. Вызывайте его, когда нужно выбросить только один ресурс.

## Синтаксис

``` php
void clearCache ([string $context = ''])
```

- `$context` _(string)_ ключ контекста, чью запись кэша удалить, по умолчанию `''` — текущий контекст

## Пример

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$resource->clearCache('web');
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.getCacheKey](extending-modx/core-model/modresource/modresource.getcachekey)
- [modResource.save](extending-modx/core-model/modresource/modresource.save)
