---
title: "Login.Request Membership"
description: "Самостоятельная регистрация пользователей через Login"
translation: "extras/login/login.tutorials/request-membership"
---

## Обзор

Если вы прошли [Basic Setup](extras/login/login.tutorials/basic-setup "Login.Basic Setup"), переходите к полной настройке Login, где _пользователи сами подают заявку на членство_. После этого вам не нужно добавлять пользователей вручную.

Extended-поля пока не используйте. Сначала добейтесь регистрации со стандартными полями. Extended-поля и профили описаны в следующем руководстве.

Хороший пример цели: [FoxyCart Forum](http://forum.foxycart.com/). Для гостя в шапке ссылка на вход. После входа открывается дополнительный функционал. Так устроены многие сайты.

FoxyCart Forum не на MODX. Мы берём упрощённый поток входа как образец.

Шаги выглядят так:

1\. **Гость на главной:** в шапке ссылка на страницу входа.

![](foxy_cart_header.jpg)

2\. **Login:** на странице входа ссылки «Forgot Password» и «Apply for Membership».

![](the_foxycart_forum_sign_in.jpg)

3\. **Redirect to the Homepage:** после успешного входа вы возвращаетесь на главную с дополнительными возможностями.

![](the_foxycart_forum_logged_in.jpg)

4\. **Logout:** по ссылке «Logout» попадаете на страницу «Come Again».

![](the_foxycart_forum_sign_out.jpg)

Схема похожа на [Basic Setup](extras/login/login.tutorials/basic-setup "Login.Basic Setup"), но страниц и шагов больше. Понадобятся [Register](extras/login/login.register "Login.Register") и [Personalize](https://modx.com/extras/package/personalize), плюс перестановка части компонентов из [Basic Setup](extras/login/login.tutorials/basic-setup "Login.Basic Setup").

В руководстве используются связанные сниппеты.

## Загрузите нужные сниппеты

К стандартному Login добавьте [Personalize](https://modx.com/extras/package/personalize). Пакет доступен через package management.

![](personalize_snippet.jpg)

Ставьте последнюю версию (от BobRay). При обновлении пакет мог отображаться отдельно.

## Создайте нужные страницы

Как в базовой настройке, сначала страницы, потом сниппеты. Нужны **9** страниц (страницы 1-5 как в базовой настройке, новые выделены):

- **Login Page (1)** : страница с формой входа
- **Forgot Password (2)** : страница «Забыли пароль»
- **Reset Password Handler (3)** : скрытая страница сброса пароля
- **Members Home Page (4)** : закрытая зона для участников
- **Come Again Soon (5)** : страница после выхода
- **Request Membership (6)** : страница «Стать участником»
- **Request Pending (7)** : уведомление о получении заявки
- **Membership Confirmation Handler (8)** : скрытая страница регистрации

И не забудьте:

- **Home Page (9)** : главная страница сайта

## Проверьте базовые права

Если ещё не настроили, подготовьте права как в [Basic Setup](extras/login/login.tutorials/basic-setup). Без этого не продолжайте.

## Добавьте сниппеты

### Login Page (1)

Украшать страницу входа не обязательно. Если сомневаетесь, пропустите блок с **Personalize** и идите дальше.

Как раньше, тот же Login:

``` php
[[!Login?
&loginTpl=`lgnLoginTpl`
&logoutTpl=`lgnLogoutTpl`
&errTpl=`lgnErrTpl`
&logoutResourceId=`5`
]]
```

### Шаблон главной страницы

Баннер «Logout» для авторизованных и «Login» для гостей делает [Personalize](https://modx.com/extras/package/personalize).

В шаблон главной добавьте, например:

``` php
<div id="your_header">
[[!Personalize? &yesChunk=`header_for_members` &noChunk=`header_for_guests` &ph=`name`]]
</div>
```

**Personalize** вызывайте без кэша.

#### Чанк header\_for\_guests

``` php
<span id="logged_in_status">Not signed in (<a href="[[~1]]">Sign in</a>)</span>
```

Важна ссылка на форму входа.

#### Чанк header\_for\_members

Для авторизованных участников:

``` php
<span id="logged_in_status">Signed in: [[+name]] (<a href="[[~1? &service=`logout`]]">Sign out</a>)</span>
```

Формат ссылки выхода: параметр передаётся на страницу _Login_.

Синтаксис параметров в MODX URL похож на параметры сниппетов. Тег `[[~1? &service=`logout`]]` с friendly URLs даёт разный результат:

- <http://yoursite.com/index.php?id=1&service=logout>
- <http://yoursite.com/login?service=logout>

MODX сам расставит «?».

Так же можно менять части страницы в зависимости от входа. В FoxyCart после входа появлялись пункты меню. Создайте ещё один [Personalize](https://modx.com/extras/package/personalize) с **yesChunk** и **noChunk**. Дальше повторяйте по необходимости.

### Login Page (1)

Тот же вызов, что в базовой настройке, плюс **redirectToPrior**. Пользователь сможет войти с любой страницы и вернуться на неё после входа.

``` php
[[!Login?
&loginTpl=`lgnLoginTpl`
&logoutTpl=`lgnLogoutTpl`
&errTpl=`lgnErrTpl`
&logoutResourceId=`5`
&redirectToPrior=`1`]]
```

В **loginTpl** добавьте ссылку «Request Membership»:

``` html
<div class="loginForm">
    <div class="loginMessage">[[+errors]]</div>
    <div class="loginLogin">
        <form class="loginLoginForm" action="[[~[[*id]]]]" method="post">
            <fieldset class="loginLoginFieldset">
                <legend class="loginLegend">[[+actionMsg]]</legend>
                <label class="loginUsernameLabel">[[%login.username]]
                    <input class="loginUsername" type="text" name="username" />
                </label>

                <label class="loginPasswordLabel">[[%login.password]]
                    <input class="loginPassword" type="password" name="password" />
                </label>
                <input class="returnUrl" type="hidden" name="returnUrl" value="[[+request_uri]]" />

                [[+login.recaptcha_html]]

                <input class="loginLoginValue" type="hidden" name="service" value="login" />
                <span class="loginLoginButton"><input type="submit" name="Login" value="[[+actionMsg]]" /></span>
            </fieldset>
        </form>
    </div>
</div>

<a href="[[~2]]">Forgot your Password?</a>  <a href="[[~6]]">Apply for Membership</a>
```

Ссылки «Forgot Password» и «Apply for Membership» можно вынести из чанка в шаблон рядом с вызовом сниппета.

### Forgot Password (2)

Как в Basic Setup: форма для запроса сброса пароля. Отправка запускает письмо со ссылкой на «Reset Passsword Handler (3)».

### Reset Password Handler (3)

Как в Basic Setup: обрабатывает ссылки из писем и сбрасывает пароли.

### Members Home Page (4)

В этом сценарии страницу часто обходят. Она всё равно полезна: по членству в «Members Only» показывает контент только участникам. В примере FoxyCart меню для участников вело на такие страницы. Создайте нужные страницы и выдайте им «Members Only».

### Come Again Soon (5)

Как в базовой настройке. Короткое сообщение и при желании ссылка на Login.

### Request Membership (6)

Форма заявки на членство. [Register](extras/login/login.register "Login.Register") обрабатывает форму прямо на странице, не в чанке.

``` html
<h2>Register</h2>

[[!Register?
    &submitVar=`registerbtn`
    &activationResourceId=`8`
    &activationEmailTpl=`lgnActivateEmailTpl`
    &activationEmailSubject=`Thanks for Registering!`
    &submittedResourceId=`7`
    &usergroups=`Members`
]]

<div class="register">
    <div class="registerMessage">[[+error.message]]</div>

    <form class="form" action="[[~[[*id]]]]" method="post">
        <input type="hidden" name="nospam:blank" value="" />

        <label for="username">[[%register.username? &namespace=`login` &topic=`register`]]
            <span class="error">[[+error.username]]</span>
        </label>
        <input type="text" name="username:required:minLength=6" id="username" value="[[+username]]" />

        <label for="password">[[%register.password]]
            <span class="error">[[+error.password]]</span>
        </label>
        <input type="password" name="password:required:minLength=6" id="password" value="[[+password]]" />

        <label for="password_confirm">[[%register.password_confirm]]
            <span class="error">[[+error.password_confirm]]</span>
        </label>
        <input type="password" name="password_confirm:password_confirm=`password`" id="password_confirm" value="[[+password_confirm]]" />

        <label for="fullname">[[%register.fullname]]
            <span class="error">[[+error.fullname]]</span>
        </label>
        <input type="text" name="fullname:required" id="fullname" value="[[+fullname]]" />

        <label for="email">[[%register.email]]
            <span class="error">[[+error.email]]</span>
        </label>
        <input type="text" name="email:email" id="email" value="[[+email]]" />

        <br class="clear" />

        <div class="form-buttons">
            <input type="submit" name="registerbtn" value="Register" />
        </div>
    </form>
</div>
```

Форма ссылается на **Request Pending (7)** и **Membership Confirmation Handler (8)**.

### Request Pending (7)

Сообщите пользователю, что заявка принята и нужно проверить почту для ссылки активации:

``` html
<p>Thank you for your interest in our site! Check your email for an activation link.
You will need to click this link before you can log into our site.</p>

```

### Membership Confirmation Handler (8)

Страница обрабатывает ссылки из писем **Register**. **ConfirmRegister** выполняет активацию. В примере перенаправление на главную (страница 9):

``` php
[[ConfirmRegister? &redirectTo=`9`]]
```

## Тестирование

### Request Membership

Откройте **Request Membership (6)**. Проверьте форму и создайте нового пользователя с email, отличным от email менеджера MODX.

Если redirect не срабатывает, проверьте ID в **&submittedResourceId**.

1. **CHECK:** после отправки формы открывается **Request Pending (7)**.
2. **CHECK:** в **Security --> Manage Users** появился новый пользователь. Он серый, пока не подтвердит email по ссылке из письма.

![](new_inactive_user.jpg)

### Проверка письма

Проверьте почту со ссылкой подтверждения. Ниже есть раздел про настройку почты на сервере.

Проверьте спам. Письмо может идти минуту-две.

1. **CHECK:** письмо пришло? Текст меняется в чанке **ActivationEmailTpl**.
2. **CHECK:** ссылка в письме верная? Переход ведёт на **Membership Confirmation Handler (8)**? Проверьте **&activationResourceId**.
3. **CHECK:** **ConfirmRegister** на **Membership Confirmation Handler (8)** работает. Если шаблон не выводит `[[**content]]`, сниппет может не выполниться. По ссылке из письма должно быть мгновенное перенаправление на главную (параметр **&redirectTo** в ConfirmRegister).
4. **CHECK:** в **Security -> Manage Users** у нового пользователя стоит **Active**. Это подтверждает активацию.

### Login

В другом браузере (не менеджер MODX) откройте **Login Page (1)** как в [basic tutorial](extras/login/login.tutorials/basic-setup "Login.Basic Setup"). Войдите новым пользователем.

1. **CHECK:** вход успешен? Redirect на **Members Home Page (4)**? Проверьте **&loginResourceId** в Login.
2. **CHECK:** **Members Home Page (4)** закрыта для гостей? В третьем браузере без входа должна быть 404.
3. **CHECK:** выход работает? Добавьте ссылку logout на Members Home. Или откройте Login с **?service=logout** в URL.

## Ошибки

### После отправки формы регистрации страница не перенаправляется

Иногда пользователь создаётся, но форма остаётся на месте. Трижды проверьте ID в **&submittedResourceId**. Если ресурса нет, пользователь создастся, а redirect упадёт.

### В письме активации пустое сообщение

Скорее всего нет чанка из **&activationEmailTpl**. Стандартная установка Login использует **lgnActivateEmailTpl**, в руководстве было **ActivateEmailTpl**.

### MODX не отправляет письма

Настройка почты зависит от сервера. Проверьте, умеет ли PHP отправлять mail. Положите на сайт скрипт и откройте в браузере:

``` php
<?php
 $to = "recipient@example.com";
 $subject = "Hi!";
 $body = "Hi,\n\nHow are you?";
 if (mail($to, $subject, $body)) {
   echo("<p>Message successfully sent!</p>");
  } else {
   echo("<p>Message delivery failed...</p>");
  }
 ?>
```

_\* Script from [About.com](http://email.about.com/od/emailprogrammingtips/qt/How_to_Send_Email_from_a_PHP_Script.htm)_

Можно настроить SMTP в System->Settings. Поиск по SMTP откроет параметры для внешнего почтового сервера.

### После регистрации белая страница

На свежих MODX редко, но проверьте: отправьте пустую форму на «Request Membership». Полностью белая страница часто связана с PHP.

Тест:

``` php
if (function_exists('mb_ereg')) {
 print 'Yes, the multibyte function exists';
}
else {
 print 'No, the function does not exist. The Register Snippet may fail.';
}
```

Решение: пересборка PHP с **mbstring** без опции _--disable-mbregex_.

Подробнее: [this forum post](https://forums.modx.com/index.php/topic,63778.0.html)
