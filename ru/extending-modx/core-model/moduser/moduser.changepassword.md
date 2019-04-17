---
title: "modUser.changePassword"
translation: "extending-modx/core-model/moduser/moduser.changepassword"
---

## modUser::changePassword

Меняет пароль пользователя. Сначала он сопоставляет oldPassword, который вы укажете, с текущим паролем, используя `modUser->passwordMatches($oldPassword)`, затем устанавливает пароль и, наконец, вызывает [OnUserChangePassword](extending-modx/plugins/system-events/onuserchangepassword "OnUserChangePassword") событие. Возвращает истину, если пароль был изменен, ложь, если нет.

## Синтаксис

API документация: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_moduser.class.html#%5CmodUser::changePassword()](http://api.modx.com/revolution/2.2/db_core_model_modx_moduser.class.html#%5CmodUser::changePassword())

``` php
boolean changePassword (string $newPassword, string $oldPassword)
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
