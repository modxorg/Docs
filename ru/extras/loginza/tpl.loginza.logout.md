---
title: "tpl.Loginza.logout"
description: "Чанк Loginza для авторизованных пользователей"
translation: "extras/loginza/tpl.loginza.logout"
---

## Описание

Чанк для авторизованных пользователей. Показывает полное имя и ссылку на выход.

``` php
Wellcome, [[+fullname]]!
<br/><br/>
<a href='[[+logout_url]]'>Logout</a>
[[+error:notempty=`<div class="alert alert-block alert-error">[[+error]]</div>`]]
```

## Плейсхолдеры

Нестандартных плейсхолдеров нет. Доступны все плейсхолдеры профиля пользователя. [Подробнее](administering-your-site/security/users "Users").

## См. также

1. [Loginza.Loginza](extras/loginza/loginza)
2. [tpl.Loginza.login](extras/loginza/tpl.loginza.login)
3. [tpl.Loginza.logout](extras/loginza/tpl.loginza.logout)
4. [tpl.Loginza.profile](extras/loginza/tpl.loginza.profile)
