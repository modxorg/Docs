---
title: "Login"
description: "Extra Login для авторизации на фронтенде, профилей, регистрации и восстановления пароля"
translation: "extras/login/index"
---

## Что такое Login?

Login, extra для безопасности MODX Revolution. Он даёт авторизацию на фронтенде, обновление профиля, регистрацию и восстановление пароля.

## История

Login написал Shaun McCormick как extra для авторизации и безопасности. Первый релиз вышел 25 июня 2009 года. Сейчас форк поддерживает команда MODX.

### Загрузка

Пакет можно установить через менеджер MODX Revolution в разделе [Package Management](developing-in-modx/advanced-development/package-management "Package Management") или скачать из репозитория MODX Extras: <https://modx.com/extras/package/login>

### Разработка и сообщения об ошибках

Исходный код Login хранится на GitHub: <https://github.com/modxcms/Login>

Ошибки можно сообщать здесь: <https://github.com/modxcms/Login/issues>

## Использование

Extra Login состоит из 10 сниппетов:

- [Login](extras/login/login "Login.Login"): формы входа и выхода.
- [UpdateProfile](extras/login/login.updateprofile "Login.UpdateProfile"): редактирование профиля на фронтенде.
- [Profile](extras/login/login.profile "Login.Profile"): выводит поля профиля как плейсхолдеры.
- [ForgotPassword](extras/login/login.forgotpassword "Login.ForgotPassword"): восстановление забытого пароля.
- [ResetPassword](extras/login/login.resetpassword "Login.ResetPassword"): страница подтверждения сброса пароля.
- [Register](extras/login/login.register "Login.Register"): обработка форм регистрации.
- [ConfirmRegister](extras/login/login.confirmregister "Login.ConfirmRegister"): подтверждение регистрации с активацией.
- [ChangePassword](extras/login/login.changepassword "Login.ChangePassword"): смена пароля на фронтенде.
- ActiveUsers: список активных пользователей онлайн.
- isLoggedIn: проверяет, авторизован ли пользователь в текущем или указанном контексте. Если нет, перенаправляет на страницу «Unauthorized».

### Отдельные сценарии

Статьи по отдельным возможностям пакета Login:

- [Using Custom Fields](extras/login/login.tutorials/using-custom-fields "Login.Using Custom Fields")
- [Using Pre and Post Hooks](extras/login/login.tutorials/using-pre-and-post-hooks "Login.Using Pre and Post Hooks")

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
