---
title: "Login"
description: "Сниппет Login для форм входа и выхода и аутентификации пользователей"
translation: "extras/login/login"
---

## Что такое Login?

Этот компонент загружает простые формы входа и выхода и обрабатывает аутентификацию пользователей.

## Использование

Пример вызова Login:

``` php
[[!Login]]
```

Можно указать шаблон. Не забудьте параметр `&tplType`:

``` php
[[!Login? &tplType=`modChunk` &loginTpl=`myLoginChunk`]]
```

Другие варианты поведения задаются свойствами сниппета.

## Свойства

Login поддерживает свойства конфигурации для настройки поведения.

| Name                   | Description                                                                                                                                                                                                                                                                                    | Default      |
| ---------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------ |
| actionKey              | REQUEST-переменная, которая указывает действие. По умолчанию `service`. Меняйте, если переменная `service` уже занята на сайте.                                                                                               | service      |
| loginKey               | Ключ действия входа. По умолчанию `login`. Login срабатывает, когда _actionKey_ равен этому значению. Например, при _actionKey_=`service` и loginKey=`login` процессор входа запустится только при запросе `&service=login`.      | login        |
| logoutKey              | Ключ действия выхода. По умолчанию `logout`. Login срабатывает, когда _actionKey_ равен этому значению. Например, при _actionKey_=`service` и logoutKey=`logout` процессор выхода запустится только при запросе `&service=logout`. | logout       |
| loginViaEmail          | (1.9.4-pl+) Принимать вход по username (modUser) или email (modUserProfile). Защита: если один email привязан к нескольким пользователям, вход по email для них недоступен.                                                                    | false        |
| rememberMeKey          | Необязательно. Имя поля переключателя «Запомнить меня». По умолчанию `rememberme`.                                                                                                                                                                                          | rememberme   |
| tplType                | Тип шаблонов для _loginTpl_ и _logoutTpl_. Возможные значения ниже.                                                                                                                                                                                   | modChunk     |
| loginTpl               | Шаблон формы входа. Тип задаётся свойством _tplType_.                                                                                                                                                                                                                       | lgnLoginTpl  |
| logoutTpl              | Шаблон формы выхода. Тип задаётся свойством _tplType_                                                                                                                                                                                                                       | lgnLogoutTpl |
| errTpl                 | Шаблон сообщения об ошибке. Тип задаётся свойством _errTplType_.                                                                                                                                                                                                                 | lgnErrTpl    |
| errTplType             | Тип шаблона для _errTpl_.                                                                                                                                                                                                                                                   | modChunk     |
| loginResourceId        | Ресурс для перенаправления после успешного входа. 0 означает перенаправление на текущую страницу. Не указывайте, если используете страницу unauthorized по умолчанию.                                                                                                                                                                | 0            |
| loginResourceParams    | JSON-объект параметров для URL перенаправления после входа. Пример: {"test":123} даёт url.html?test=123                                                                                                                                                                           |              |
| logoutResourceId       | ID ресурса для перенаправления после успешного выхода. 0 означает перенаправление на текущую страницу.                                                                                                                                                                                                                      | 0            |
| logoutResourceParams   | JSON-объект параметров для URL перенаправления после выхода. Пример: {"test":123} даёт url.html?test=123                                                                                                                                                                          |              |
| loginMsg               | Необязательная подпись для действия входа. Если пусто, берётся строка лексикона Login.                                                                                                                                                                                                   |              |
| logoutMsg              | Необязательная подпись для действия выхода. Если пусто, берётся строка лексикона Logout.                                                                                                                                                                                                 |              |
| redirectToPrior        | Если true, после успешного входа перенаправляет на страницу-источник (HTTP\_REFERER).                                                                                                                                                                                                              | 0            |
| contexts               | Список контекстов для входа через запятую. По умолчанию текущий контекст, если не задано явно.                                                                                                                                                                         |              |
| preHooks               | Список «хуков» или сниппетов через запятую. Выполняются до регистрации пользователя, но после валидации. Можно указать `recaptcha` как хук.                                                                                                                              |              |
| postHooks              | Список «хуков» или сниппетов через запятую. Выполняются после регистрации пользователя.                                                                                                                                                                                            |              |
| toPlaceholder          | Если задано, вывод сниппета сохраняется в плейсхолдер с этим именем вместо прямого вывода.                                                                                                                                                            |              |
| redirectToOnFailedAuth | (1.6.4-pl+) перенаправляет на отдельную страницу при неудачном входе                                                                                                                                                                                                                                      |              |

## Необязательные свойства (не Login)

Параметры, которые упрощают работу с Login.

| Name            | Description                                                                                                                     | Default |
| --------------- | ------------------------------------------------------------------------------------------------------------------------------- | ------- |
| recaptchaHeight | Высота iframe ReCaptcha.                                                               | 300     |
| recaptchaTheme  | Тема ReCaptcha: `red`, `white`, `blackglass`, `clean` и другие, которые добавит Google. | clean   |
| recaptchaWidth  | Ширина iframe ReCaptcha.                                                                | 500     |

### Варианты tplType

Свойства tplType и errTplType принимают такие значения:

- _modChunk_: шаблон должен быть именем чанка.
- _file_: абсолютный путь к файлу шаблона.
- _inline_: содержимое шаблона прямо в свойстве tpl.
- _embedded_: шаблон уже на странице. Ошибки выводятся через плейсхолдеры.

## Использование reCaptcha

Сначала задайте системные настройки `recaptcha.public_key` и `recaptcha.private_key`. Затем добавьте preHook `recaptcha`:

``` php
[[!Login? &preHooks=`recaptcha`]]
```

В чанке loginTpl должен быть плейсхолдер `[[+login.recaptcha_html]]`. Тогда reCaptcha станет обязательной для входа.

См. [необязательные свойства для настроек ReCaptcha](extras/login/login)

## Выход

Чтобы выйти, откройте страницу с вызовом **Login** и передайте `logout` через URL как service. В этом примере сниппет Login на странице 21:

``` php
<a href="[[~21? &service=logout]]" title="Logout">Logout</a>
(which automatically appends '&service=logout' to your URL)
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

См. также [Making Member-Only Pages](administering-your-site/security/security-tutorials/making-member-only-pages "Making Member-Only Pages")
