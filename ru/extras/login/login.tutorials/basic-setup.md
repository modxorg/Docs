---
title: "Login.Basic Setup"
description: "Базовая настройка портала входа Login на фронтенде"
translation: "extras/login/login.tutorials/basic-setup"
---

В этом руководстве перечислены нужные страницы и сниппеты на каждой. После настройки пользователи смогут входить через фронтенд. Администратор создаёт их вручную в менеджере. Отдельное [руководство](extras/login/login.tutorials/request-membership "Login.Request Membership") описывает самостоятельную подачу заявки на членство.

Даже базовая настройка портала входа затрагивает много связанных частей. Здесь почти каждая функция на отдельной странице. Чище вынести часть логики в чанки или шаблоны, но этот материал даёт достаточно информации для запуска портала.

На всех страницах ниже используется условный **page\_id** для примера.

## Создайте нужные страницы

Перед добавлением сниппетов создайте **5** страниц в MODX Revo:

- **Login Page (1)** : страница с формой входа
- **Forgot Password (2)** : страница «Забыли пароль»
- **Reset Password Handler (3)** : скрытая страница, которая сбрасывает пароль
- **Members Home Page (4)** : закрытая зона только для участников
- **Come Again Soon (5)** : страница после успешного выхода

Далее настройте права и разрешения для пользователей и ресурсов.

## Создайте группы пользователей и группы ресурсов

MODX Revolution даёт детальную модель [Permissions](administering-your-site/security/policies/permissions "Permissions"). Ниже базовая схема для старта. Подробнее: [Making Member-Only Pages](administering-your-site/security/security-tutorials/making-member-only-pages "Making Member-Only Pages").

В MODX 2.2.3+ большую часть шага можно пропустить через **Access Wizard**. Он появляется при создании группы ресурсов в **Content -> Resource Groups**. Настройки:

- Name: Members
- Context: web
- Automatically Give Adminstrator Group Access: **checked**
- Create Parallel User Group: **checked**
- Automatically Give Anonymous Access: _UNCHECKED_
- Automatically Give Other User Groups Access: _blank_

Если у вас старая версия MODX или нужно разобраться в процессе, выполните шаги вручную:

1\. **Content -> Resource Groups** : создайте группу ресурсов для страниц только для участников.

![](create_resource_group.jpg)

2\. **Security -> Access Controls** : создайте группу пользователей «Members». Участники этой группы получат доступ к ресурсам «Members Only».

![](create+user+group.jpg)

3\. На той же странице (**Security -> Access Controls**) **правый клик** по группе «Members» и выберите «Update User Group».

![](update_user_group.jpg)

![](update_user_group_detail.jpg)

Добавьте группу ресурсов к группе пользователей. Минимальные настройки:

- **Resource Group:** Members Only (созданная выше)
- **Mimimum Role:** Member-9999
- **Access Policy:** Load, List and View
- **Context:** web

Сохраните.

4\. **Security -> Manage Users** : создайте тестового «member», чтобы проверить портал входа.

Запомните простой username и password. Важно добавить пользователя в группу «Members». Вкладка «Access Permissions», кнопка «Add User to Group»

![](new_user_as_group_member.jpg)

- **User Group:** Members
- **Role:** Member

Так новый пользователь сможет войти и просматривать страницы «Members Only».

Вернитесь к страницам и добавьте сниппеты (подставьте свои ID ресурсов).

## Добавьте сниппеты на страницы

### Login Page (1)

Вызов на странице входа:

``` php
[[!Login?
&loginTpl=`lgnLoginTpl`
&logoutTpl=`lgnLogoutTpl`
&errTpl=`lgnErrTpl`
&loginResourceId=`4`
&logoutResourceId=`5`
]]
```

Сохраните страницу. В вызове много аргументов. Многие ссылаются на чанки. При установке Login часть чанков уже создана (вкладка Elements). Иногда нужны свои чанки и другие имена в параметрах. Здесь настраивается чанк **lgnLoginTpl**.

Чанк формы входа должен содержать ссылку на «Forgot Password», чтобы показывать её только неавторизованным. Пример **lgnLoginTpl**. Создайте чанк с таким именем или отредактируйте существующий:

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
<a href="[[~2]]">Forgot your Password?</a>
```

Ссылку «Forgot your Password» можно вынести в шаблон вместо чанка. Главное, чтобы структура сайта оставалась понятной и вы не вкладывали чанки друг в друга без необходимости.

### Forgot Password (2)

- _Обычно скрыта из меню_

Страница с формой запроса сброса пароля. Она не сбрасывает пароль сама. Сброс выполняет сниппет «ResetPassword».

``` php
[[!ForgotPassword? &resetResourceId=`3` &tpl=`lgnForgotPassTpl`]]
```

Схема потока:

![](password_reset_flow.jpg)

### Reset Password Handler (3)

- _Скрыта из меню_

По ссылке из письма пользователь попадает сюда. При валидной ссылке пароль сбрасывается и выполняется перенаправление на страницу входа.

``` php
[[!ResetPassword? &loginResourceId=`1`]]
```

Убедитесь, что страницы **Forgot Password (2)** и **Reset Password Handler (3)** опубликованы.

### Members Home Page (4)

Страница для успешно вошедших пользователей. Доступ ограничен правами. Добавьте любой закрытый контент. В «Access Permissions» или «Resource Groups» (зависит от версии MODX):

![](setting_access_permissions.jpg)

Отметьте «Members Only».

### Come Again Soon (5)

Страница после успешного выхода. Достаточно короткого сообщения или ссылки на Login:

``` html
<p>Thank you for visiting! Come again soon!</p>
```

## Необязательно

### Logout Page

- _WebLink_

Не обязательна, но удобна для тестов как отдельная WebLink для выхода.

Weblink:

``` php
[[~1? &service=`logout`]]
```

То же самое, что ссылка на странице:

``` html
<a href="[[~1? &service=`logout`]]" title="Logout">Logout</a>
```

## Возможные ошибки

Проверьте все части. При успешном входе на Login вы попадёте на «Members Home Page». Выход: ссылка Logout на странице Login или WebLink «Logout Page». После выхода откроется «Come Again Soon».

### Не получается войти!

Чаще всего неверные ID страниц, опечатки в именах чанков или пропущенные квадратные скобки в тегах. Перепроверьте внимательно.

Сниппеты вызывайте без кэша. Вызов с восклицательным знаком:

``` php
[[!Login]]
```

а **не**

``` php
[[Login]]
```

### Не получается выйти!

Иногда ссылка выхода ведёт не на страницу с **Login**. Ссылка выхода должна указывать на ту же страницу, где размещён сниппет Login.

Если письма сброса пароля не уходят, проверьте настройку почты на сервере.

### Ошибки входа не отображаются

При несуществующем username иногда не видно сообщений об ошибке.

### Error HTTP 500 (Internal Server Error)

Если на страницах «Members Only» появляется HTTP 500, а в логе MODX есть `does not have permission to load object of class modContext with primary key`, проверьте Context Access. При нескольких контекстах выдайте Contexts Access ко всем контекстам.
