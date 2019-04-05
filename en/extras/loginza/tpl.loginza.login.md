---
title: "tpl.Loginza.login"
_old_id: "1023"
_old_uri: "revo/loginza/tpl.loginza.login"
---

- [Description](#tpl.Loginza.login-Description)
- [Placeholders](#tpl.Loginza.login-Placeholders)
- [See Also](#tpl.Loginza.login-SeeAlso)



## Description

This is chunk for not authenticated users. It is loading Loginza script from its service and display the link for login.

After validation you will be redirected back to site with action **login**, and snippet will authenticate you.

``` php 
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

If you experience troubles with login, please verify generated link for return. Friendly urls are strongly recommended.

## Placeholders

There is no unusual placeholders in this chunk.

## See Also

1. [Loginza.Loginza](/extras/revo/loginza/loginza.loginza)
2. [tpl.Loginza.login](/extras/revo/loginza/tpl.loginza.login)
3. [tpl.Loginza.logout](/extras/revo/loginza/tpl.loginza.logout)
4. [tpl.Loginza.profile](/extras/revo/loginza/tpl.loginza.profile)