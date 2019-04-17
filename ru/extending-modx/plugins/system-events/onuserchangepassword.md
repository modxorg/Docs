---
title: "OnUserChangePassword"
translation: "extending-modx/plugins/system-events/onuserchangepassword"
---

## Событие: OnUserChangePassword

Срабатывает каждый раз, когда пользователь правильно меняет свой пароль.

Служба: 3 - Template Service Events
Группа: Нет

## Параметры события

| Имя          | Описание                                   |
| ------------ | ------------------------------------------ |
| user         | Ссылка на объект modUser пользователя.     |
| newpassword  | Устанавливаемый новый пароль.              |
| oldpassword  | Старый пароль перезаписываемый.            |
| userid       | Идентификатор пользователя. (Устаревшее)   |
| username     | Имя username пользователя. (Устаревшее)    |
| userpassword | Устанавливаемый новый пароль. (Устаревшее) |

## Смотри также

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
