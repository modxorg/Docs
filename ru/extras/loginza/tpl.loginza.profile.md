---
title: "tpl.Loginza.profile"
description: "Чанк Loginza для просмотра и редактирования профиля"
translation: "extras/loginza/tpl.loginza.profile"
---

## Описание

Чанк для просмотра и редактирования профиля пользователя.

``` html
<form action="[[~[[*id]]]]" method="post" class="form-horizontal">
    <div class="control-group[[+error.username:notempty=` error`]]">
        <label class="control-label">???</label>
        <div class="controls">
            <input type="text" name="username" value="[[+username]]" />
            <span class="help-inline">[[+error.username]]</span>
        </div>
    </div>

    <div class="control-group[[+error.fullname:notempty=` error`]]">
        <label class="control-label">?????? ???</label>
        <div class="controls">
            <input type="text" name="fullname" value="[[+fullname]]" />
            <span class="help-inline">[[+error.fullname]]</span>
        </div>
    </div>

    <div class="control-group[[+error.email:notempty=` error`]]">
        <label class="control-label">Email</label>
        <div class="controls">
            <input type="text" name="email" value="[[+email]]" />
            <span class="help-inline">[[+error.email]]</span>
        </div>
    </div>
    <input type="hidden" name="action" value="updateProfile" />
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Update profile</button>
    </div>
</form>
[[+success:is=`1`:then=`<div class="alert alert-block">Profile was successfully updated</div>`]]
[[+success:is=`0`:then=`<div class="alert alert-block alert-error">Error on profile update</div>`]]
```

## Плейсхолдеры

Плейсхолдеры modUser и modUserProfile.

## См. также

1. [Loginza.Loginza](extras/loginza/loginza)
2. [tpl.Loginza.login](extras/loginza/tpl.loginza.login)
3. [tpl.Loginza.logout](extras/loginza/tpl.loginza.logout)
4. [tpl.Loginza.profile](extras/loginza/tpl.loginza.profile)
