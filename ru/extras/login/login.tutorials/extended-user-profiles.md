---
title: "Login.Extended User Profiles"
description: "Расширенные поля профиля пользователя в Login"
translation: "extras/login/login.tutorials/extended-user-profiles"
---

## Обзор

Это руководство продолжает [Basic Setup](extras/login/login.tutorials/user-profiles "Login.User Profiles") и [User Profiles](extras/login/login.tutorials/user-profiles "Login.User Profiles"). Не начинайте, пока остальные сценарии входа не работают. Здесь вы добавите extended-поля в профили пользователей.

Вы измените сниппеты, которые уже настроены в [User Profiles](extras/login/login.tutorials/user-profiles "Login.User Profiles").

## Проверьте наличие нужных страниц

Новые страницы не создаём. Для справки список страниц (как в прошлых руководствах):

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

## Ориентир

Речь о _extended_-полях пользователя. Откройте пользователя в **Security -> Manage Users -> правый клик по пользователю**, вкладка Extended Fields. Там видны пользовательские поля.

![](user_extended_fields.jpg)

На скриншоте видны лишние поля от прошлых экспериментов. См. [forum post](http://forums.modx.com/thread/72395/update-profile-created-bogus-extended-fields#dis-post-426733).

Любое поле, добавленное здесь, доступно как плейсхолдер в профиле.

## Обновление страниц

### Request Membership (6)

Добавьте extended-поля в форму регистрации, чтобы заполнить их сразу. Если поля нужны только после регистрации, этот шаг пропустите.

Форма похожа на Update Profile. К прежней форме из прошлого руководства добавлено поле `custom_field`:

``` html
[[!Register?
    &submitVar=`registerbtn`
    &activationResourceId=`8`
    &activationEmailTpl=`lgnActivateEmailTpl`
    &activationEmailSubject=`Thanks for Registering!`
    &submittedResourceId=`7`
    &usergroups=`Members`
    &excludeExtended=`email:required:email,login-updprof-btn`
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

        <label for="custom_field">Custom Field
            <span class="error">[[+error.custom_field]]</span>
        </label>
        <input type="text" name="custom_field" id="custom_field" value="[[+custom_field]]" />

        <br class="clear" />

        <div class="form-buttons">
            <input type="submit" name="registerbtn" value="Register" />
        </div>
    </form>
</div>
```

В **&activationEmailTpl** укажите правильный чанк письма. Здесь используется **lgnActivateEmailTpl** по умолчанию.

### Update Profile (10)

Страница использует больше возможностей [UpdateProfile](extras/login/login.updateprofile "Login.UpdateProfile"). Добавлено поле `custom_field`. Явно задан **&useExtended**, чтобы лишние POST-поля сохранялись как extended.

``` html
[[!UpdateProfile? &excludeExtended=`email:required:email,login-updprof-btn` &useExtended=`1`]]

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

        <label for="custom_field">Custom Field
            <span class="error">[[+error.custom_field]]</span>
        </label>
        <input type="text" name="custom_field" id="custom_field" value="[[+custom_field]]" /><br/>

                <br class="clear" />

        <div class="form-buttons">
            <input type="submit" name="login-updprof-btn" value="[[!%login.update_profile]]" />
        </div>
    </form>
</div>

<p><a href="[[~12]]">Change Password</a></p>
```

Зачем **&excludeExtended**? В Login есть баг с полями, у которых заданы правила валидации.

### View Profile (11)

Используем [Profile](extras/login/login.profile "Login.Profile"). Добавьте плейсхолдеры для extra-полей. Пример для **custom_field**:

``` php
[[!Profile]]

<p>Username: [[+username]]</p>
<p>Full Name: [[+fullname]]</p>
<p>Email: [[+email]]</p>
<p>Custom Field: [[+custom_field]]</p>

<p><a href="[[~10]]">Edit</a></p>
```

## Тестирование

### Login

Войдите через фронтенд в отдельном браузере. Это должно работать из прошлого руководства.

### View Profile (11)

1. **CHECK:** страница показывает ваши данные, включая custom_field.

### Update Profile (10)

Измените данные профиля.

1. **CHECK:** сохраняются ли изменения? Попробуйте изменить custom_field и сохранить.

## Варианты

У FormIt есть [FormItCountryOptions](extras/formit/formit.formitcountryoptions "FormIt.FormItCountryOptions"). Для страны пользователя удобен выпадающий список:

``` php
<select name="country">
[[!FormItCountryOptions? &selected=`[[!+country]]` &prioritized=`US,GB,CA,AU` &prioritizedGroupText=`Frequent Visitors` &allGroupText=`Other Countries`]]
</select>
```

Для штатов США есть [FormItStateOptions](extras/formit/formit.formitstateoptions "FormIt.FormItStateOptions")
