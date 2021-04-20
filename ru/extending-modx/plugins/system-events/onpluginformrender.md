---
title: "OnPluginFormRender"
translation: "extending-modx/plugins/system-events/onpluginformrender"
---

## Событие: OnPluginFormRender

Пожары во время рендеринга формы. Полезно для рендеринга HTML прямо в форму плагина.

Служба: 1 - Parser Service Events
Группа: Plugins

## Параметры события

| Имя   | Описание                                                    |
| ----- | ----------------------------------------------------------- |
| mode  | Либо 'new' либо 'upd', в зависимости от обстоятельств.      |
| id    | ID плагина. Будет 0 для новых плагинов.                     |
| chunk | Ссылка на объект modPlugin. Будет нулевым в новых плагинах. |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
