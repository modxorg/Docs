---
title: "OnPluginFormRender"
translation: "extending-modx/plugins/system-events/onpluginformrender"
description: "Событие запускается при отображении формы плагина."
---

## Событие: OnPluginFormRender

Событие запускается во время отображения формы. Полезно для вывода HTML прямо в форму плагина.

- Служба: 1 - Parser Service Events
- Group: Plugins

## Параметры события

| Имя    | Описание                                                        |
| ------ | --------------------------------------------------------------- |
| mode   | `'new'` или `'upd'` в зависимости от ситуации.                  |
| id     | Идентификатор плагина. Для новых плагинов равен 0.              |
| plugin | Ссылка на объект `modPlugin`. Для новых плагинов не передаётся. |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
