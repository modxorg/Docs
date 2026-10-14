---
title: "OnPluginFormPrerender"
translation: "extending-modx/plugins/system-events/onpluginformprerender"
description: "Событие запускается до отображения формы редактирования плагина."
---

## Событие: OnPluginFormPrerender

Событие запускается до отображения формы редактирования плагина, но после регистрации JS. Может использоваться для вывода собственного Javascript в менеджере.

- Служба: 1 - Parser Service Events
- Group: Plugins

## Параметры события

| Имя    | Описание                                                                |
| ------ | ----------------------------------------------------------------------- |
| mode   | `'new'` или `'upd'` в зависимости от ситуации.                          |
| id     | Идентификатор плагина. Для новых плагинов равен 0.                      |
| plugin | Ссылка на объект `modPlugin`. Для новых плагинов не передаётся.         |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
