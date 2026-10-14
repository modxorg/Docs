---
title: "OnBeforeSnipFormDelete"
translation: "extending-modx/plugins/system-events/onbeforesnipformdelete"
description: "Событие запускается перед удалением сниппета в менеджере."
---

## Событие: OnBeforeSnipFormDelete

Событие запускается перед удалением сниппета в менеджере.

- Служба: 1 - Parser Service Events
- Group: Snippets

## Параметры события

| Имя     | Описание                     |
| ------- | ---------------------------- |
| snippet | Ссылка на объект modSnippet. |
| id      | Идентификатор сниппета.      |
| object  | Псевдоним `snippet` — ссылка на тот же объект. |

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

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
