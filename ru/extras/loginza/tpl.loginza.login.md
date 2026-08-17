---
title: "tpl.Loginza.login"
description: "Чанк Loginza для неавторизованных пользователей"
translation: "extras/loginza/tpl.loginza.login"
---

## Описание

Чанк для неавторизованных пользователей. Загружает скрипт Loginza с сервиса и показывает ссылку для входа.

После проверки вас вернут на сайт с action **login**, и сниппет выполнит авторизацию.

``` html
<script type="text/javascript" src="http://loginza.ru/js/widget.js"></script>
Authentication through Loginza
<a href="https://loginza.ru/api/widget?token_url=[[+login_url]]">
    <img src="http://loginza.ru/img/providers/yandex.png" alt="Yandex" title="Yandex">
    <img src="http://loginza.ru/img/providers/google.png" alt="Google" title="Google Accounts">
    <img src="http://loginza.ru/img/providers/vkontakte.png" alt="Vkontakte" title="Vkontakte">
    <img src="http://loginza.ru/img/providers/mailru.png" alt="Mail.ru" title="Mail.ru">
    <img src="http://loginza.ru/img/providers/twitter.png" alt="Twitter" title="Twitter">
    <img src="http://loginza.ru/img/providers/loginza.png" alt="Loginza" title="Loginza">
    <img src="http://loginza.ru/img/providers/myopenid.png" alt="MyOpenID" title="MyOpenID">
    <img src="http://loginza.ru/img/providers/openid.png" alt="OpenID" title="OpenID">
    <img src="http://loginza.ru/img/providers/webmoney.png" alt="WebMoney" title="WebMoney">
</a>
[[+error:notempty=`<div class="alert alert-block alert-error">[[+error]]</div>`]]
```

При проблемах со входом проверьте сгенерированную ссылку возврата. Рекомендуются ЧПУ.

## Плейсхолдеры

В этом чанке нет нестандартных плейсхолдеров.

## См. также

1. [Loginza.Loginza](extras/loginza/loginza)
2. [tpl.Loginza.login](extras/loginza/tpl.loginza.login)
3. [tpl.Loginza.logout](extras/loginza/tpl.loginza.logout)
4. [tpl.Loginza.profile](extras/loginza/tpl.loginza.profile)
