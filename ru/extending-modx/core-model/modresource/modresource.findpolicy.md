---
title: "modResource.findPolicy"
translation: "extending-modx/core-model/modresource/modresource.findpolicy"
description: "Загрузить политики доступа к группам ресурсов ресурса"
---

## modResource.findPolicy

Собирает строки ACL `modAccessResourceGroup`, действующие для этого ресурса в указанном контексте, соединённые с его группами ресурсов. Результат кэшируется в `_policies` по контекстам, поэтому повторные вызовы в рамках одного запроса больше не обращаются к базе данных.

Возвращает пустой массив, когда для контекста выключен `access_resource_group_enabled`, либо когда не нашлось ни одной подходящей строки ACL. `modAccessibleObject::checkPolicy()` построен на этом методе.

## Синтаксис

``` php
array findPolicy ([string $context = ''])
```

- `$context` _(string)_ ключ контекста, для которого загрузить политики, по умолчанию `''` — текущий контекст

## Пример

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$policies = $resource->findPolicy('web');
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.save](extending-modx/core-model/modresource/modresource.save)
