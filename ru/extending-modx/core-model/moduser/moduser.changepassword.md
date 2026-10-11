---
title: "modUser.changePassword"
translation: "extending-modx/core-model/moduser/moduser.changepassword"
description: "Сменить пароль пользователя, при желании проверив старый"
---

## modUser::changePassword

Меняет пароль пользователя. По умолчанию сначала сопоставляет `$oldPassword` с текущим паролем через `modUser->passwordMatches()`, затем устанавливает новый пароль и в конце вызывает событие [OnUserChangePassword](extending-modx/plugins/system-events/onuserchangepassword "OnUserChangePassword"). Возвращает истину, если пароль был изменён, ложь — если нет.

Передайте в `$validateOldPassword` значение `false`, чтобы пропустить проверку старого пароля.

## Синтаксис

``` php
boolean changePassword (string $newPassword, string $oldPassword [, boolean $validateOldPassword = true])
```

## Пример

Измените пароль пользователя 'foobar' с 'boo123' на 'b33r4me'

``` php
$user = $modx->getObject('modUser',array('username' => 'foobar'));
$user->changePassword('b33r4me', 'boo123');
```

Измените пароль пользователя, вошедшего в систему с 'mypass' на 's3cur3d'.

``` php
$modx->user->changePassword('s3cur3d','mypass');
```

## Смотрите также

- [modUser](extending-modx/core-model/moduser)
- [Users](building-sites/client-proofing/security/users)
