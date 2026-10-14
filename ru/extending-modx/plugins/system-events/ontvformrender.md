---
title: "OnTVFormRender"
translation: "extending-modx/plugins/system-events/ontvformrender"
description: "Событие запускается в контроллере создания/обновления TV во время формирования заполнителей страницы; возвращённый вывод присваивается JavaScript-переменной MODx.onTVFormRender."
---

## Событие: OnTVFormRender

Событие запускается в контроллере создания/обновления TV во время формирования заполнителей страницы; возвращённый вывод присваивается JavaScript-переменной `MODx.onTVFormRender`.

- Служба: 1 - Parser Service Events
- Group: Template Variables

## Параметры события

| Имя  | Описание                                                                       |
| ---- | ------------------------------------------------------------------------------ |
| mode | `'new'` или `'upd'` в зависимости от ситуации.                                 |
| id   | ID TV. Для новых элементов равен 0.                                            |
| tv   | Ссылка на объект `modTemplateVar`. Не передаётся при создании нового элемента. |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
