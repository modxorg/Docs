---
title: "OnTempFormRender"
translation: "extending-modx/plugins/system-events/ontempformrender"
description: "Событие запускается в контроллере создания/обновления шаблона во время формирования заполнителей страницы; возвращённый вывод присваивается JavaScript-переменной MODx.onTempFormRender."
---

## Событие: OnTempFormRender

Событие запускается в контроллере создания/обновления шаблона во время формирования заполнителей страницы; возвращённый вывод присваивается JavaScript-переменной `MODx.onTempFormRender`.

- Служба: 1 - Parser Service Events
- Group: Templates

## Параметры события

| Имя      | Описание                                                                     |
| -------- | ---------------------------------------------------------------------------- |
| mode     | `'new'` или `'upd'` в зависимости от ситуации.                               |
| id       | ID шаблона. Для новых элементов равен 0.                                     |
| template | Ссылка на объект `modTemplate`. Не передаётся при создании нового элемента.  |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
