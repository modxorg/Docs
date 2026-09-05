---
title: "OnWebLogin"
translation: "extending-modx/plugins/system-events/onweblogin"
---

## Событие: OnWebLogin

Вызывается после успешной аутентификации пользователя во фронтенд-контексте (не `mgr`) и после добавления session contexts. Плагины не меняют результат входа.

- Служба: 3 - Web Access Events
- Группа: Нет

## Параметры события

| Имя        | Описание                                                                    |
| ---------- | --------------------------------------------------------------------------- |
| user       | Объект `modUser`, который только что вошёл.                                 |
| attributes | Массив:                                                                     |
|            | - rememberme — запоминать ли вход                                           |
|            | - lifetime — время жизни session cookie для этого входа                     |
|            | - loginContext — ключ контекста входа                                       |
|            | - addContexts — дополнительные контексты, куда тоже записали сессию         |

## `$modx->getUser()` во время OnWebLogin

Процессор входа добавляет session contexts **до** вызова `OnWebLogin`. На уровне сессии пользователь уже вошёл.

Для web-контекстов процессор **не** обновляет `$modx->user` перед событием. `$modx->getUser()` часто возвращает прежний объект из запроса (аноним / id `0` или другой уже закэшированный пользователь). Поэтому `$modx->getUser()` «врёт», хотя вход уже прошёл.

Берите пользователя из параметра события `$user` (или `$scriptProperties['user']`). Если нужен именно `$modx->getUser()`, сбросьте и перезагрузите после появления сессии:

```php
$modx->user = null;
$modx->getUser($attributes['loginContext'], true);
```

При входе в manager процессор обновляет `$modx->user` до [OnManagerLogin](extending-modx/plugins/system-events/onmanagerlogin). Для web / `OnWebLogin` этого шага нет.

## Рабочий процесс входа

1. [OnBeforeWebLogin](extending-modx/plugins/system-events/onbeforeweblogin) || [OnBeforeManagerLogin](extending-modx/plugins/system-events/onbeforemanagerlogin) — плагин может прервать вход, вернув значение, отличное от `true`.
2. [OnUserNotFound](extending-modx/plugins/system-events/onusernotfound) — только если имени пользователя нет в БД MODX. Плагин может отдать свой `modUser` и продолжить вход.
3. [OnWebAuthentication](extending-modx/plugins/system-events/onwebauthentication) || [OnManagerAuthentication](extending-modx/plugins/system-events/onmanagerauthentication) — плагин может обойти проверку пароля по умолчанию. Возврат `true` считает пользователя аутентифицированным.
4. **OnWebLogin** || [OnManagerLogin](extending-modx/plugins/system-events/onmanagerlogin) — после добавления session contexts. Не меняет успех или отказ входа. На web берите `$user` из события, а не `$modx->getUser()` (см. выше).

## Пример

Записать в журнал ошибок, кто вошёл и с какими атрибутами:

```php
<?php
$eventName = $modx->event->name;
switch ($eventName) {
    case 'OnWebLogin':
        $name = $user->get('username');
        $modx->log(modX::LOG_LEVEL_ERROR, 'Авторизовался пользователь ' . $name . ' ' . print_r($attributes, true));
        break;
}
```

## Смотрите также

- [Системные события](extending-modx/plugins/system-events)
- [Плагины](extending-modx/plugins)
- [OnManagerLogin](extending-modx/plugins/system-events/onmanagerlogin)
