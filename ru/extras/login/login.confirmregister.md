---
title: "ConfirmRegister"
description: "Сниппет ConfirmRegister для подтверждения регистрации с активацией"
translation: "extras/login/login.confirmregister"
---

## Что такое ConfirmRegister?

ConfirmRegister подтверждает регистрацию пользователя из сниппета [Register](extras/login/login.register "Login.Register"), когда в том сниппете `activation` равен 1 (значение по умолчанию). Его размещают на отдельной странице «Registration Activated».

## Использование

[Register](extras/login/login.register "Login.Register") по умолчанию требует активации аккаунта перед входом. Сниппет создаёт объект modUser и ставит поле `active` в 0. Пользователь получает письмо со ссылкой для активации. После перехода по ссылке аккаунт получает `active=1`, и пользователь может войти.

Создайте страницу активации: новый ресурс и вызов [ConfirmRegister](extras/login/login.confirmregister "Login.ConfirmRegister"):

``` php
[[!ConfirmRegister]]
```

Пример вызова [Register](extras/login/login.register "Login.Register") с активацией:

``` php
[[!Register?
   &activationEmailTpl=`myActivationEmailTpl`
   &activationEmailSubject=`Please activate your account!`
   &activationResourceId=`26`
]]
```

Пользователь получит письмо из чанка `myActivationEmailTpl` с указанной темой. Ссылка ведёт на ресурс 26, где размещён ConfirmRegister.

Задайте `activePage`, если нужна отдельная страница для повторного открытия ссылки активации (аккаунт уже активен). Задайте `redirectBack` или `redirectTo`, если после успешного подтверждения нужно увести пользователя дальше (корзина, форма членства и т.п.).

### Свойства по умолчанию

| Name                       | Description                                                                                                                                                          | Default |
| -------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------- |
| redirectTo                 | Необязательно. После успешного подтверждения перенаправить на этот ресурс.                                                                                           |         |
| redirectParams             | Необязательно. JSON-объект параметров при перенаправлении через redirectTo.                                                                                          |         |
| redirectBack               | Необязательно. ID ресурса для редиректа после подтверждения, если `redirectTo` пуст. Можно также передать в ссылке / запросе подтверждения.                          |         |
| redirectBackParams         | Необязательно. Параметры запроса для `redirectBack` (JSON в свойстве сниппета или значение из запроса подтверждения). Используются, если `redirectParams` пуст.      |         |
| redirectUnsetDefaultParams | Необязательно. Если true, не подмешивать persist-параметры Register (`username`, `userid` и остальной query) в URL редиректа.                                        | 0       |
| authenticate               | Авторизовать и войти пользователя в текущий контекст после подтверждения регистрации.                                                                                | 1       |
| authenticateContexts       | Необязательно. Список контекстов для авторизации через запятую. По умолчанию текущий контекст.                                                                       |         |
| errorPage                  | Необязательно. ID ресурса при ошибке подтверждения (битая или пустая ссылка, пользователь не найден и т.п.). Если пусто, показывается страница ошибки сайта.         |         |
| activePage                 | Необязательно. ID ресурса при повторном открытии ссылки активации, когда пользователь **уже** активен. Если пусто, используется `errorPage` (или страница ошибки).   |         |

### События

ConfirmRegister вызывает событие плагина [OnUserActivate](developing-in-modx/basic-development/plugins/system-events/onuseractivate "OnUserActivate") после активации пользователя. В параметре `user` передаётся только что активированный объект modUser.

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
10. [Login.Using Pre and Post Hooks](extras/login/login.tutorials/using-pre-and-post-hooks)
