---
title: "OnManagerLogout"
translation: "extending-modx/plugins/system-events/onmanagerlogout"
---

## Событие: OnManagerLogout

Срабатывает после того, как пользователь вышел из панели управления и его контекстный сеанс удален.

Служба: 2 - Manager Access Service Events
Группа: Нет

## Параметры события

| Имя                | Описание                                                                                      |
| ------------------ | --------------------------------------------------------------------------------------------- |
| **&** user         | Ссылка на объект modUser пользователя. **Передано по ссылке**                                 |
| userid             | Идентификатор пользователя. (Устаревшее)                                                      |
| username           | Имя username пользователя. (Устаревшее)                                                       |
| **&** loginContext | Ключ контекста, в котором происходит выход из системы. **Передано по ссылке**                 |
| **&** addContexts  | Дополнительные контексты, в которых также происходит выход из системы. **Передано по ссылке** |

## Смотри также

- [OnBeforeWebLogout event](extending-modx/plugins/system-events/onbeforeweblogout "OnBeforeWebLogout")
- [OnBeforeManagerLogout event](extending-modx/plugins/system-events/onbeforemanagerlogout "OnBeforeManagerLogout")
- [OnWebLogout event](extending-modx/plugins/system-events/onweblogout "OnWebLogout")
- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
