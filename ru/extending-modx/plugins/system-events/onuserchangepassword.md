---
title: "OnUserChangePassword"
translation: "extending-modx/plugins/system-events/onuserchangepassword"
description: "Срабатывает каждый раз, когда пользователь корректно меняет свой пароль."
---

## Событие: OnUserChangePassword

Срабатывает каждый раз, когда пользователь корректно меняет свой пароль.

- Служба: 1 - Parser Service Events
- Group: Users

## Параметры события

| Имя          | Описание                                   |
| ------------ | ------------------------------------------ |
| user         | Ссылка на объект modUser пользователя.     |
| newpassword  | Устанавливаемый новый пароль.              |
| oldpassword  | Старый пароль перезаписываемый.             |
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

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
