---
title: "UpdateProfile"
description: "Сниппет UpdateProfile для редактирования профиля на фронтенде"
translation: "extras/login/login.updateprofile"
---

## Что такое UpdateProfile?

UpdateProfile даёт авторизованным на фронтенде пользователям редактировать свой профиль.

## Использование

Создайте ресурс, куда пользователь перейдёт для редактирования профиля. Добавьте сниппет:

``` php
[[!UpdateProfile? &validate=`fullname:required,email:required:email`]]
```

### Свойства UpdateProfile

| Name                  | Description                                                                                                                                                                                                                                                                                      | Default           |
| --------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | ----------------- |
| submitVar             | Имя кнопки отправки формы, которая запускает обработку.                                                                                                                                                                                                                                 | login-updprof-btn |
| validate              | Список полей для валидации через запятую в формате name:validator (например username:required,email:required). [Validators](extras/formit/formit.validators "FormIt.Validators") можно цепочкой, например email:email:required. Свойство можно задать в несколько строк. |                   |
| redirectToLogin       | Если true, неавторизованных пользователей перенаправляет на страницу Unauthorized.                                                                                                                                                                                        | 1                 |
| reloadOnSuccess       | Если true, страница перезагружается с GET-параметром против двойной отправки. Если false, выставляется плейсхолдер успеха.                                                                                                                                                  | 1                 |
| emailField            | Имя поля email в форме.                                                                                                                                                                                                                                                  | email             |
| preHooks              | Список «хуков» или сниппетов через запятую. Выполняются до обновления профиля, но после валидации. Можно указать `captcha` как хук.                                                                                                                           |                   |
| postHooks             | Список «хуков» или сниппетов через запятую. Выполняются после обновления профиля.                                                                                                                                                                                       |                   |
| syncUsername          | Если задано имя колонки Profile, UpdateProfile попытается синхронизировать username с этим полем после успешного сохранения.                                                                                                                                                                   |                   |
| allowedFields         | Список полей, которые можно обновлять, через запятую. Пустое значение разрешает все поля профиля.                                                                                                                                                        |                   |
| useExtended           | Сохранять ли дополнительные поля формы в extended-поле Profile. Полезно для пользовательских полей.                                                                                                                                                             | 1                 |
| allowedExtendedFields | Список extended-полей, разрешённых в форме при useExtended. Пустое значение разрешает любые дополнительные поля.                                                                                                                                                  |                   |
| excludeExtended       | Список полей, которые не сохранять как extended, через запятую.                                                                                                                                                                                                                     |                   |
| placeholderPrefix     | Префикс для всех плейсхолдеров, которые задаёт этот сниппет.                                                                                                                                                                                                                                      |                   |

### Форма UpdateProfile

Ниже добавьте HTML (уберите ненужные поля). Разметку можно менять, имена полей формы сохраняйте. Тот же код есть в core/components/login/chunks/lgnupdateprofile.chunk.tpl.

``` html
<div class="update-profile">
    <div class="updprof-error">[[+error.message]]</div>
    [[+login.update_success:is=`1`:then=`[[%login.profile_updated? &namespace=`login` &topic=`updateprofile`]]`]]

    <form class="form" action="[[~[[*id]]]]" method="post">
        <input type="hidden" name="nospam" value="" />

        <label for="fullname">[[!%login.fullname? &namespace=`login` &topic=`updateprofile`]]
            <span class="error">[[+error.fullname]]</span>
        </label>
        <input type="text" name="fullname" id="fullname" value="[[+fullname]]" />

        <label for="email">[[!%login.email]]
            <span class="error">[[+error.email]]</span>
        </label>
        <input type="text" name="email" id="email" value="[[+email]]" />

        <label for="phone">[[!%login.phone]]
            <span class="error">[[+error.phone]]</span>
        </label>
        <input type="text" name="phone" id="phone" value="[[+phone]]" />

        <label for="mobilephone">[[!%login.mobilephone]]
            <span class="error">[[+error.mobilephone]]</span>
        </label>
        <input type="text" name="mobilephone" id="mobilephone" value="[[+mobilephone]]" />

        <label for="fax">[[!%login.fax]]
            <span class="error">[[+error.fax]]</span>
        </label>
        <input type="text" name="fax" id="fax" value="[[+fax]]" />

        <label for="address">[[!%login.address]]
            <span class="error">[[+error.address]]</span>
        </label>
        <input type="text" name="address" id="address" value="[[+address]]" />

        <label for="country">[[!%login.country]]
            <span class="error">[[+error.country]]</span>
        </label>
        <input type="text" name="country" id="country" value="[[+country]]" />

        <label for="city">[[!%login.city]]
            <span class="error">[[+error.city]]</span>
        </label>
        <input type="text" name="city" id="city" value="[[+city]]" />

        <label for="state">[[!%login.state]]
            <span class="error">[[+error.state]]</span>
        </label>
        <input type="text" name="state" id="state" value="[[+state]]" />

        <label for="zip">[[!%login.zip]]
            <span class="error">[[+error.zip]]</span>
        </label>
        <input type="text" name="zip" id="zip" value="[[+zip]]" />

        <label for="website">[[!%login.website]]
            <span class="error">[[+error.website]]</span>
        </label>
        <input type="text" name="website" id="website" value="[[+website]]" />

        <br class="clear" />

        <div class="form-buttons">
            <input type="submit" name="login-updprof-btn" value="[[!%login.update_profile]]" />
        </div>
    </form>
</div>
```

### Обновление фото профиля в UpdateProfile

Чтобы обновить аватар, добавьте поле загрузки файла в HTML-форму и реализуйте pre-hook сниппет. Пример: [Profile logo update custom postHook example](extras/login/login.tutorials/using-pre-and-post-hooks#profile-logo-update-custom-posthook)

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
