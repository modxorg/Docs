---
title: "OnPluginFormPrerender"
translation: "extending-modx/plugins/system-events/onpluginformprerender"
---

## Событие: OnPluginFormPrerender

Происходит до визуализации формы модификации плагина, но после регистрации JS. Может использоваться для визуализации пользовательского Javascript для mgr.

Служба: 1 - Parser Service Events
Группа: Plugins

## Параметры события

| Имя    | Описание                                                    |
| ------ | ----------------------------------------------------------- |
| mode   | Либо 'new' либо 'upd', в зависимости от обстоятельств.      |
| id     | ID плагина. Будет 0 для новых плагинов.                     |
| plugin | Ссылка на объект modPlugin. Будет нулевым в новых плагинах. |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
