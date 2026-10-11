---
title: "modResource.isDuplicateAlias"
translation: "extending-modx/core-model/modresource/modresource.isduplicatealias"
description: "Проверить, не занят ли путь alias"
---

## modResource.isDuplicateAlias

Ищет другой недалённый ресурс с тем же `uri`. При пустом `$aliasPath` путь строится из собственного alias ресурса. Сам ресурс исключается по ID, поэтому он никогда не конфликтует с собой.

Возвращает ID конфликтующего ресурса целым числом либо `false`, если путь свободен. Передайте `$contextKey`, чтобы ограничить поиск одним контекстом.

## Синтаксис

``` php
mixed isDuplicateAlias ([string $aliasPath = '' [, string $contextKey = '']])
```

- `$aliasPath` _(string)_ полный путь alias для проверки, по умолчанию `''`
- `$contextKey` _(string)_ контекст для поиска, по умолчанию `''` — поиск во всех контекстах

## Пример

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$duplicateId = $resource->isDuplicateAlias('parent/about-us', 'web');
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.getAliasPath](extending-modx/core-model/modresource/modresource.getaliaspath)
