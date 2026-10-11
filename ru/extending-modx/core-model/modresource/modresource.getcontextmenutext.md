---
title: "modResource.getContextMenuText"
translation: "extending-modx/core-model/modresource/modresource.getcontextmenutext"
description: "Получить подписи контекстного меню класса ресурса"
---

## modResource.getContextMenuText

Возвращает две подписи, которые контекстное меню менеджера показывает для этого класса ресурса: `text_create` и `text_create_here`. Базовая реализация подставляет общие записи лексикона `resource`, `modDocument` переопределяет её записями `document`.

Процессор `ConfigJs` вызывает метод для каждого производного класса с включённым `showInContextMenu`. В производном классе метод предполагается к переопределению, а не к прямому вызову.

## Синтаксис

``` php
array getContextMenuText ()
```

## Пример

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$labels = $resource->getContextMenuText();
echo $labels['text_create'];
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.getResourceTypeName](extending-modx/core-model/modresource/modresource.getresourcetypename)
