---
title: "OnBeforeUserActivate"
translation: "extending-modx/plugins/system-events/onbeforeuseractivate"
description: "Событие запускается перед активацией пользователя в менеджере."
---

## Событие: OnBeforeUserActivate

Событие запускается перед тем, как статус `active` пользователя будет переключён на «активен» в менеджере: в `security/user/update` при смене статуса в процессе редактирования пользователя и в `security/user/activatemultiple` при массовой активации. Ответ события обрабатывается: непустое сообщение запрещает изменение.

- Служба: 1 - Parser Service Events
- Group: Users

## Параметры события

| Имя  | Описание                                                                            |
| ---- | ----------------------------------------------------------------------------------- |
| id   | Идентификатор пользователя.                                                         |
| user | Ссылка на объект modUser. **Передано по ссылке**                                    |
| mode | Либо `upd` (один пользователь в `security/user/update`), либо `multiple` (только массовая активация). |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
