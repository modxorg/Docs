---
title: "OnResourceUndelete"
translation: "extending-modx/plugins/system-events/onresourceundelete"
description: "Срабатывает сразу после восстановления ресурса из корзины."
---

## Событие: OnResourceUndelete

Срабатывает сразу после восстановления ресурса.

- Служба: 1 - Parser Service Events
- Group: Resources

## Параметры события

| Имя        | Описание                                      |
| ---------- | --------------------------------------------- |
| `id`       | ID восстановленного ресурса.                  |
| `resource` | Ссылка на восстановленный объект modResource. |

## Замечания

Событие вызывается из трёх мест:

-   процессора восстановления (`Resource/Undelete`),
-   восстановления ресурса из сетки корзины (`Resource/Trash/Restore`),
-   процессора обновления ресурса, когда удалённый ресурс снова публикуется (`Resource/Update`).

## Смотрите также

-   [Системные события](extending-modx/plugins/system-events "Системные события")
-   [Плагины](extending-modx/plugins "Плагины")
