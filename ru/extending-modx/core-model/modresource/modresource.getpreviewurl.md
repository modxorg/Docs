---
title: "modResource.getPreviewUrl"
translation: "extending-modx/core-model/modresource/modresource.getpreviewurl"
description: "Построить URL предпросмотра ресурса в менеджере"
---

## modResource.getPreviewUrl

Возвращает URL за кнопкой «Предпросмотр» в менеджере. Для обычного документа метод вызывает `modX::makeUrl()` для этого ресурса. Симлинки должны хранить цель целым числом. Веблинки могут хранить ID, тег `[[~id]]`, тег ссылки с опциями или внешний URL. Варианты с ID проверяются через `canPreviewResource()`.

Пустая строка возвращается для удалённого ресурса, пустой или недопустимой ссылки, а также если цель не прошла проверку; `null` никогда не возвращается. Когда в контексте отключены сеансы, к URL добавляется параметр запроса `preview=true`. У вызова есть побочный эффект: опция `cache_alias_map` выключается до конца запроса.

## Синтаксис

``` php
string getPreviewUrl ()
```

## Пример

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$url = $resource->getPreviewUrl();
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.canPreviewResource](extending-modx/core-model/modresource/modresource.canpreviewresource)
- [modResource.parseContent](extending-modx/core-model/modresource/modresource.parsecontent)
