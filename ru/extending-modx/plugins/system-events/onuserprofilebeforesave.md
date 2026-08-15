---
title: "OnUserProfileBeforeSave"
translation: "extending-modx/plugins/system-events/onuserprofilebeforesave"
---

## Событие: OnUserProfileBeforeSave

Срабатывает прямо перед сохранением `modUserProfile`. Это расширенный профиль (email, ФИО, телефон, блокировки, JSON `extended` и т.п.), а не запись входа `modUser`. Для самого пользователя используйте [OnUserBeforeSave](extending-modx/plugins/system-events/onuserbeforesave).

Вызывается из `modUserProfile::save()` в MODX Revolution 3.x.

- Служба: 1 - Parser Service Events
- Группа: User Profiles

## Параметры события

| Имя | Описание |
| --- | -------- |
| userprofile | Ссылка на объект `modUserProfile`, который сейчас сохранят. |
| mode | `modSystemEvent::MODE_NEW` (`new`) или `modSystemEvent::MODE_UPD` (`upd`), в зависимости от того, новый ли профиль. |
| cacheFlag | Значение `$cacheFlag`, переданное в `save()`. |

## Смотрите также

- [OnUserProfileSave](extending-modx/plugins/system-events/onuserprofilesave)
- [OnUserBeforeSave](extending-modx/plugins/system-events/onuserbeforesave)
- [Системные события](extending-modx/plugins/system-events)
- [Плагины](extending-modx/plugins)
