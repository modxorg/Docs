---
title: "Profile"
description: "Сниппет Profile для вывода полей профиля пользователя как плейсхолдеров"
translation: "extras/login/login.profile"
---

## Что такое Profile?

Profile выставляет все поля профиля текущего (или указанного) пользователя как плейсхолдеры. Вы можете показать данные профиля на странице.

## Использование

Добавьте сниппет на страницу, где нужны плейсхолдеры полей профиля:

``` php
[[!Profile]]
```

Выведите их через плейсхолдеры:

``` php
<p>Username: [[+username]]</p>
<p>Email: [[+email]]</p>
<p>State: [[+state]]</p>
```

Поля пароля никогда не попадают в плейсхолдеры из соображений безопасности.

### Свойства Profile

Сниппет поддерживает свойства по умолчанию, которые можно переопределить:

| Name        | Description                                                                                                 | Default |
| ----------- | ----------------------------------------------------------------------------------------------------------- | ------- |
| prefix      | Префикс для всех плейсхолдеров полей, которые задаёт этот сниппет.                                           |         |
| user        | Необязательно. ID или имя пользователя. Если задано, используется этот пользователь вместо текущего.       |         |
| useExtended | Если true, выставляет плейсхолдерами и все extended-поля.                                                   | 1       |

## Пример

Вывод email и username текущего пользователя:

``` php
[[!Profile]]

<p>Username: [[+username]]</p>
<p>Email: [[+email]]</p>
```

Профиль пользователя `marksmith` с префиксом плейсхолдеров `user.`:

``` php
[[!Profile? &user=`marksmith` &prefix=`user.`]]
```

Любимый цвет (extended-поле) текущего пользователя с префиксом `usr.`:

``` php
[[!Profile? &prefix=`usr.`]]

<p>[[+usr.username]]'s favorite color is [[+usr.color]]</p>
```

## См. также

1. [Login.Login](extras/login/login)
2. [Login.Profile](extras/login/login.profile)
3. [Login.UpdateProfile](extras/login/login.updateprofile)
4. [Login.Register](extras/login/login.register)
   1. [Register.Example Form 1](extras/login/login.register/example-form-1)
5. [Login.ConfirmRegister](extras/login/login.confirmregister)
6. [Login.ForgotPassword](extras/login/login.forgotpassword)
7. [Login.ResetPassword](extras/login/login.resetpassword)
8. [Login.ChangePassword](extras/login/login.changepassword)
9. [Login.Tutorials](extras/login/login.tutorials)
   1. [Login.Basic Setup](extras/login/login.tutorials/basic-setup)
   2. [Login.Extended User Profiles](extras/login/login.tutorials/extended-user-profiles)
   3. [Login.Request Membership](extras/login/login.tutorials/request-membership)
   4. [Login.User Profiles](extras/login/login.tutorials/user-profiles)
   5. [Login.Using Custom Fields](extras/login/login.tutorials/using-custom-fields)
   6. [Login.Using Pre and Post Hooks](extras/login/login.tutorials/using-pre-and-post-hooks)
