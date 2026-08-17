---
title: "ChangePassword"
description: "Сниппет ChangePassword для смены пароля на фронтенде"
translation: "extras/login/login.changepassword"
---

## Что такое ChangePassword?

ChangePassword работает вместе с [Login](extras/login/login "Login.Login"). Разместите его где угодно. Он обработает вашу форму и сменит пароль пользователя.

## Использование

Создайте форму смены пароля. В начале страницы добавьте вызов сниппета. Пример:

``` html
<h2>Change Password</h2>
[[!ChangePassword?
   &submitVar=`change-password`
   &placeholderPrefix=`cp.`
   &validateOldPassword=`1`
   &validate=`nospam:blank`
]]
<div class="updprof-error">[[!+cp.error_message]]</div>
<form class="form" action="[[~[[*id]]]]" method="post">
    <input type="hidden" name="nospam" value="" />
    <div class="ff">
        <label for="password_old">Old Password
            <span class="error">[[!+cp.error.password_old]]</span>
        </label>
        <input type="password" name="password_old" id="password_old" value="[[+cp.password_old]]" />
    </div>
    <div class="ff">
        <label for="password_new">New Password
            <span class="error">[[!+cp.error.password_new]]</span>
        </label>
        <input type="password" name="password_new" id="password_new" value="[[+cp.password_new]]" />
    </div>
    <div class="ff">
        <label for="password_new_confirm">Confirm New Password
            <span class="error">[[!+cp.error.password_new_confirm]]</span>
        </label>
        <input type="password" name="password_new_confirm" id="password_new_confirm" value="[[+cp.password_new_confirm]]" />
    </div>
    <div class="ff">
        <input type="submit" name="change-password" value="Change Password" />
    </div>
</form>
```

### Свойства ChangePassword

| Name                    | Description                                                                                                                                                                                                                                               | Default                |
| ----------------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------- |
| submitVar               | Переменная, по которой ChangePassword определяет отправку формы. Если пусто или false, форма обрабатывается при любом POST.                                                                                                       | logcp-submit           |
| fieldOldPassword        | Имя поля старого пароля.                                                                                                                                                                                                                 | password\_old          |
| fieldNewPassword        | Имя поля нового пароля.                                                                                                                                                                                                                 | password\_new          |
| fieldConfirmNewPassword | Необязательно. Имя поля подтверждения пароля. Значение сверяется с полем нового пароля.                                                                                                                     | password\_new\_confirm |
| validateOldPassword     | 1 или 0. Требовать ли текущий пароль для успешного сброса.                                                                                                                                                  | 1                      |
| preHooks                | Скрипты после успешной валидации, но до сохранения. Список хуков через запятую. При ошибке первого следующие не выполняются. Хук может быть именем сниппета. |                        |
| postHooks               | Скрипты после регистрации пользователя. Список хуков через запятую. При ошибке первого следующие не выполняются. Хук может быть именем сниппета.               |                        |
| redirectToLogin         | Если пользователь не авторизован, перенаправить на страницу Unauthorized.                                                                                                                                                            | 1                      |
| reloadOnSuccess         | Если 1, страница перезагружается с GET-параметром против двойной отправки. Если 0, выставляется плейсхолдер успеха.                                                                                                                  | 1                      |
| successMessage          | Если reloadOnSuccess=0, выводится в плейсхолдер \[prefix\].successMessage.                                                                                                                                                         |                        |
| placeholderPrefix       | Префикс для всех плейсхолдеров, которые задаёт этот сниппет.                                                                                                                                                                                               | logcp.                 |

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
