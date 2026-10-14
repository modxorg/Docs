---
title: "OnSnipFormSave"
translation: "extending-modx/plugins/system-events/onsnipformsave"
description: "Событие запускается после создания или обновления сниппета в менеджере."
---

## Событие: OnSnipFormSave

Событие запускается после создания или обновления сниппета в менеджере.

- Служба: 1 - Parser Service Events
- Group: Snippets

## Параметры события

| Имя     | Описание                                                           |
| ------- | ------------------------------------------------------------------ |
| mode    | `'new'` или `'upd'` в зависимости от ситуации.                     |
| id      | ID сниппета.                                                       |
| snippet | Ссылка на объект `modSnippet`.                                     |
| object  | Ссылка на объект `modSnippet` — тот же экземпляр, что и `snippet`. |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
