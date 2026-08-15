---
title: "OnUserProfileSave"
translation: "extending-modx/plugins/system-events/onuserprofilesave"
---

## Событие: OnUserProfileSave

Срабатывает после успешного сохранения `modUserProfile`. Это расширенный профиль (email, ФИО, телефон, блокировки, JSON `extended` и т.п.), а не запись входа `modUser`. Для самого пользователя используйте [OnUserSave](extending-modx/plugins/system-events/onusersave).

Вызывается из `modUserProfile::save()` только если `parent::save()` вернул true.

- Служба: 1 - Parser Service Events
- Группа: User Profiles

## Параметры события

| Имя | Описание |
| --- | -------- |
| userprofile | Ссылка на сохранённый объект `modUserProfile`. |
| mode | `modSystemEvent::MODE_NEW` (`new`) или `modSystemEvent::MODE_UPD` (`upd`), в зависимости от того, был ли профиль новым. |
| cacheFlag | Значение `$cacheFlag`, переданное в `save()`. |

## Смотрите также

- [OnUserProfileBeforeSave](extending-modx/plugins/system-events/onuserprofilebeforesave)
- [OnUserSave](extending-modx/plugins/system-events/onusersave)
- [Системные события](extending-modx/plugins/system-events)
- [Плагины](extending-modx/plugins)
