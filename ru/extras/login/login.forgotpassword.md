---
title: "ForgotPassword"
description: "Сниппет ForgotPassword для формы восстановления забытого пароля"
translation: "extras/login/login.forgotpassword"
---

## Что такое ForgotPassword?

ForgotPassword обрабатывает форму, когда пользователь забыл пароль и хочет его восстановить.

## Использование

Создайте ресурс, куда пользователь попадёт по ссылке из письма подтверждения. Разместите на нём сниппет [ResetPassword](extras/login/login.resetpassword "Login.ResetPassword"). Укажите ресурс со сниппетом Login или страницу, куда вернуть пользователя:

``` php
[[!ResetPassword? &loginResourceId=`72`]]
```

Создайте второй ресурс со сниппетом ForgotPassword. Укажите ресурс со сниппетом Reset:

``` php
[[!ForgotPassword? &resetResourceId=`123`]]
```

### Свойства ForgotPassword

| Name            | Description                                                                                                           | Default                  |
| --------------- | --------------------------------------------------------------------------------------------------------------------- | ------------------------ |
| tpl             | Шаблон сообщения сброса пароля. Тип задаётся свойством _tplType_.                                  | lgnForgotPassTpl         |
| tplType         | Тип шаблона для _tpl_                                                                               | modChunk                 |
| errTpl          | Шаблон сообщения об ошибке. Тип задаётся свойством _errTplType_.                                        | lgnErrTpl                |
| errTplType      | Тип шаблона для _errTpl_                                                                           | modChunk                 |
| emailTpl        | Шаблон письма подтверждения.                                                                                   | lgnForgotPassEmail       |
| emailTplAlt     | Альтернативный шаблон письма для multipart-сообщения с текстовой версией.                                |                          |
| emailSubject    | Тема письма                                                                                      | Password Retrieval Email |
| emailTplType    | Тип шаблона для _emailTpl_                                                                          | modChunk                 |
| sentTpl         | Шаблон сообщения после успешной отправки письма.                                                          | lgnForgotPassSentTpl     |
| sentTplType     | Тип шаблона для _sentTpl_                                                                           | modChunk                 |
| loginResourceId | Ресурс для перенаправления после успешного подтверждения.                                                           | 1                        |
| resetResourceId | Ресурс со сниппетом [Login.ResetPassword](extras/login/login.resetpassword "Login.ResetPassword"). | 1                        |

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
