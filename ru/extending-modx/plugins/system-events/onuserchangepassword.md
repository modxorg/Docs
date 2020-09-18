---
title: "OnUserChangePassword"
translation: "extending-modx/plugins/system-events/onuserchangepassword"
---

## Событие: OnUserChangePassword

Запускается каждый раз, когда пользователь меняет пароль.

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

## Пример

Такой плагин выведет в Журнал ошибок" кто поменял пароль, какой у него был пароль и на какой он его поменял:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnUserChangePassword':
        $name = $user->get('username');
        $modx->log(modX::LOG_LEVEL_ERROR, 'Пользователь '.$name.' поменял пароль '.'c '.$newpassword.' на '.$oldpassword);
        break;
}
```

## Смотри также

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
