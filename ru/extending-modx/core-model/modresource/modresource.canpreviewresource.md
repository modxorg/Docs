---
title: "modResource.canPreviewResource"
translation: "extending-modx/core-model/modresource/modresource.canpreviewresource"
description: "Проверить, что цель предпросмотра существует и не удалена"
---

## modResource.canPreviewResource

Проверяет цель предпросмотра до того, как менеджер построит URL предпросмотра. Значение `$targetId`, чья строковая форма начинается с `0` — само `0` и строки вроде `05` — отклоняется в первую очередь; затем цель загружается, и она не должна быть удалённой. Каждый неудачный путь пишет в журнал ошибок сообщение лексикона `resource_err_preview_*`; `$sourceId` только определяет, какое именно сообщение будет записано. Предпросмотр самим собой — когда `$sourceId` равен `$targetId` или не передан вовсе — получает собственные записи.

Метод объявлен с типом возврата `bool` и всегда возвращает логическое значение. В ядре его вызывает только `getPreviewUrl()`.

## Синтаксис

``` php
boolean canPreviewResource (int|string $targetId [, int|string|null $sourceId = null])
```

- `$targetId` _(int|string)_ ID ресурса, который будут предпросматривать
- `$sourceId` _(int|string|null)_ ID ресурса, с которого запросили предпросмотр, по умолчанию `null`

## Пример

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
if ($resource->canPreviewResource(5)) {
    $url = $resource->getPreviewUrl();
}
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.getPreviewUrl](extending-modx/core-model/modresource/modresource.getpreviewurl)
