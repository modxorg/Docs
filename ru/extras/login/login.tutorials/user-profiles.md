---
title: "Login.User Profiles"
description: "Страницы просмотра, редактирования профиля и смены пароля"
translation: "extras/login/login.tutorials/user-profiles"
---

## Обзор

Это руководство продолжает [Basic Setup](extras/login/login.tutorials/request-membership "Login.Request Membership") (которое опирается на [Basic Setup](extras/login/login.tutorials/basic-setup "Login.Basic Setup")). Не начинайте, пока остальные сценарии входа не работают.

## Создайте нужные страницы

Как в [Basic Setup](extras/login/login.tutorials/basic-setup "Login.Basic Setup"), сначала создайте страницы, потом добавьте сниппеты. Нужны **9** страниц из прошлой настройки плюс новые (выделены):

- **Login Page (1)** : страница с формой входа
- **Forgot Password (2)** : страница «Забыли пароль»
- **Reset Password Handler (3)** : скрытая страница сброса пароля
- **Members Home Page (4)** : закрытая зона для участников
- **Come Again Soon (5)** : страница после выхода
- **Request Membership (6)** : страница «Стать участником»
- **Request Pending (7)** : уведомление о получении заявки
- **Membership Confirmation Handler (8)** : скрытая страница регистрации
- **Home Page (9)** : главная страница сайта
- **Update Profile (10)** : редактирование профиля
- **View Profile (11)** : просмотр профиля
- **Change Password (12)** : смена пароля

### Update Profile (10)

На странице разместите [UpdateProfile](extras/login/login.updateprofile "Login.UpdateProfile"). Сниппет в начале, плейсхолдеры в разметке.

Создайте страницу и добавьте её в группу ресурсов «Members Only».

Пример содержимого:

``` html
[[!UpdateProfile? &useExtended=`0`]]

<div class="update-profile">
    <div class="updprof-error">[[+error.message]]</div>
    [[+login.update_success:if=`[[+login.update_success]]`:is=`1`:then=`[[%login.profile_updated? &namespace=`login` &topic=`updateprofile`]]`]]

    <form class="form" action="[[~[[*id]]]]" method="post">
        <input type="hidden" name="nospam:blank" value="" />

        <label for="fullname">[[!%login.fullname? &namespace=`login` &topic=`updateprofile`]]
            <span class="error">[[+error.fullname]]</span>
        </label>
        <input type="text" name="fullname" id="fullname" value="[[+fullname]]" />

        <label for="email">[[!%login.email]]
            <span class="error">[[+error.email]]</span>
        </label>
        <input type="text" name="email:required:email" id="email" value="[[+email]]" />

                <br class="clear" />

        <div class="form-buttons">
            <input type="submit" name="login-updprof-btn" value="[[!%login.update_profile]]" />
        </div>
    </form>
</div>
```

Урезанный пример со страницы [UpdateProfile](extras/login/login.updateprofile "Login.UpdateProfile"). Заметки для MODX:

1. Текст через записи лексикона MODX. См. \[[Internationalization](developing-in-modx/advanced-development/internationalization "Internationalization")\] для перевода. Например `<label>[[!%login.email]]</label>` вместо `<label>Email</label>`. Тег переведётся. Жёстко прописанный текст нет.
2. Поле password **никогда** не редактируют напрямую из соображений безопасности. Для смены пароля используйте [ChangePassword](extras/login/login.changepassword "Login.ChangePassword").

Чтобы запретить редактирование поля, просто уберите его из формы.

### View Profile (11)

На странице разместите [Profile](extras/login/login.profile "Login.Profile"). Сниппет в начале, плейсхолдеры ниже.

Создайте страницу и добавьте её в группу «Members Only».

Пример содержимого:

``` php
[[!Profile]]

<p>Username: [[+username]]</p>
<p>Full Name: [[+fullname]]</p>
<p>Email: [[+email]]</p>

<p><a href="[[~10]]">Edit</a></p>
```

Ссылка Edit ведёт на редактирование. Пароль не показывают из соображений безопасности.

### Change Password (12)

Отдельная страница смены пароля. Пример по [ChangePassword](extras/login/login.changepassword "Login.ChangePassword"):

``` html
<h2>Change Password</h2>
[[!ChangePassword?
   &submitVar=`change-password`
   &placeholderPrefix=``
   &validateOldPassword=`1`
   &validate=`nospam:blank`
   &reloadOnSuccess=`0`
   &successMessage=`Your password has been updated!`
]]
<div>[[!+successMessage]]</div>
<div class="updprof-error">[[!+error_message]]</div>
<form class="form" action="[[~[[*id]]]]" method="post">
    <input type="hidden" name="nospam" value="" />
    <div class="ff">
        <label for="password_old">Old Password
            <span class="error">[[!+error.password_old]]</span>
        </label>
        <input type="password" name="password_old" id="password_old" value="[[+password_old]]" />
    </div>
    <div class="ff">
        <label for="password_new">New Password
            <span class="error">[[!+error.password_new]]</span>
        </label>
        <input type="password" name="password_new" id="password_new" value="[[+password_new]]" />
    </div>
    <div class="ff">
        <label for="password_new_confirm">Confirm New Password
            <span class="error">[[!+error.password_new_confirm]]</span>
        </label>
        <input type="password" name="password_new_confirm" id="password_new_confirm" value="[[+password_new_confirm]]" />
    </div>
    <div class="ff">
        <input type="submit" name="change-password" value="Change Password" />
    </div>
</form>
```

Следите за **&placeholderPrefix**. По умолчанию `logcp.`, что часто даёт неожиданные эффекты. Почти всегда задавайте этот параметр явно.

Добавьте ссылку на эту страницу со страницы редактирования профиля.

### Members Home Page (4)

Добавьте ссылку на просмотр профиля:

``` php
...
<p><a href="[[~11]]">View Profile</a></p>
```

## Тестирование

### Login

Войдите через фронтенд в отдельном браузере. Это должно работать из прошлого руководства.

### View Profile (11)

1. **CHECK:** страница показывает ваши данные.

### Update Profile (10)

Измените данные профиля.

1. **CHECK:** сохраняются ли Full Name или Email?

## Дальше

Когда всё работает, переходите к [Extended User Profiles](extras/login/login.tutorials/extended-user-profiles "Login.Extended User Profiles"). См. также [Using Custom Fields](extras/login/login.tutorials/using-custom-fields "Login.Using Custom Fields")
