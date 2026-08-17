---
title: "ResetPassword"
description: "Сниппет ResetPassword для сброса пароля по ссылке из письма"
translation: "extras/login/login.resetpassword"
---

## Что такое ResetPassword?

ResetPassword работает вместе с [ForgotPassword](extras/login/login.forgotpassword "Login.ForgotPassword"). Пользователь переходит по ссылке из письма, и сниппет сбрасывает пароль.

## Использование

Создайте ресурс для входа после перехода по ссылке из письма. Разместите на нём [ResetPassword](extras/login/login.resetpassword "Login.ResetPassword"). Укажите ресурс со сниппетом Login или страницу для ссылки «назад»:

``` php
[[!ResetPassword? &loginResourceId=`72`]]
```

Создайте второй ресурс со сниппетом [ForgotPassword](extras/login/login.forgotpassword "Login.ForgotPassword"). Укажите ресурс со сниппетом Reset:

``` php
[[!ForgotPassword? &resetResourceId=`123`]]
```

### Свойства ResetPassword

| Name                | Description                                                                          | Default                   |
| ------------------- | ------------------------------------------------------------------------------------ | ------------------------- |
| tpl                 | Шаблон сообщения сброса пароля. Тип задаётся свойством _tplType_. | lgnResetPassTpl           |
| tplType             | Тип шаблона для _tpl_                                              | modChunk                  |
| loginResourceId     | Ресурс для перенаправления после успешного сброса.                                 | 1                         |
| expiredTpl          | Шаблон сообщения об истечении временного пароля.                                              | lgnExpiredTpl             |
| changePasswordTpl   | Шаблон формы смены пароля.                                                        | lgnResetPassChangePassTpl |
| autoLogin           | Сразу авторизовать пользователя после перехода по ссылке из письма.                 | false                     |
| forceChangePassword | Требовать немедленную смену пароля после перехода по ссылке из письма.           | false                     |

### Варианты tplType

Свойство tplType принимает такие значения:

- _modChunk_: шаблон должен быть именем чанка.
- _file_: абсолютный путь к файлу шаблона.
- _inline_: содержимое шаблона прямо в свойстве tpl.
- _embedded_: шаблон уже на странице. Ошибки выводятся через плейсхолдеры.

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
