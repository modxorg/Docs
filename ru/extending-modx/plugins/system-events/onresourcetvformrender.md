---
title: "OnResourceTVFormRender"
translation: "extending-modx/plugins/system-events/onresourcetvformrender"
description: "Событие запускается при рендеринге вкладки Template Variables в редакторе ресурса."
---

## Событие: OnResourceTVFormRender

Событие запускается при рендеринге вкладки Template Variables в редакторе ресурса (и при создании, и при редактировании ресурса).

- Служба: 1 - Parser Service Events
- Group: Resources

## Параметры события

| Имя        | Описание                                                     |
| ---------- | ------------------------------------------------------------ |
| categories | Массив категорий TV, передаётся по ссылке.                   |
| template   | ID шаблона ресурса.                                          |
| resource   | ID редактируемого ресурса.                                   |
| tvCounts   | Массив с количеством TV по категориям, передаётся по ссылке. |
| hidden     | Скрыта ли вкладка TV, передаётся по ссылке.                  |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
