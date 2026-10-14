---
title: "OnSnipFormRender"
translation: "extending-modx/plugins/system-events/onsnipformrender"
description: "Событие запускается в контроллере создания/обновления сниппета во время формирования заполнителей страницы; возвращённый вывод присваивается JavaScript-переменной MODx.onSnipFormRender."
---

## Событие: OnSnipFormRender

Событие запускается в контроллере создания/обновления сниппета во время формирования заполнителей страницы; возвращённый вывод присваивается JavaScript-переменной `MODx.onSnipFormRender`.

- Служба: 1 - Parser Service Events
- Group: Snippets

## Параметры события

| Имя    | Описание                                                                    |
| ------ | --------------------------------------------------------------------------- |
| mode   | `'new'` или `'upd'` в зависимости от ситуации.                              |
| id     | ID сниппета. Для новых элементов равен 0.                                   |
| snippet| Ссылка на объект `modSnippet`. Не передаётся при создании нового элемента.  |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
