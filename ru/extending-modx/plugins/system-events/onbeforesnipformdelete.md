---
title: "OnBeforeSnipFormDelete"
translation: "extending-modx/plugins/system-events/onbeforesnipformdelete"
---

## Событие: OnBeforeSnipFormDelete

Запускается до удаления сниппета.

Служба: 1 - Parser Service Events
Group: Snippets

## Параметры события

| Имя     | Описание                     |
| ------- | ---------------------------- |
| snippet | Ссылка на объект modSnippet. |
| id      | Идентификатор сниппета.      |

## Пример

Такой плагин выведет сообщение о том, что нельзя удалять сниппеты:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeSnipFormDelete':
        $modx->event->output("Нельзя удалять сниппеты!?");
        break;
}
```

## Смотри также

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
