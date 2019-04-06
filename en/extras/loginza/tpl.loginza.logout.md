---
title: "tpl.Loginza.logout"
_old_id: "1024"
_old_uri: "revo/loginza/tpl.loginza.logout"
---

## Description

This is chunk for authenticated users. It is display full name of logged in user and link to exit.

``` php 
Wellcome, [[+fullname]]!
<br/><br/>
<a href='[[+logout_url]]'>Logout</a>
[[+error:notempty=`<div class="alert alert-block alert-error">[[+error]]</div>`]]
```

## Placeholders

There is no unusual placeholders in this chunk. You can use all placeholders from users profile. [Read more](administering-your-site/security/users "Users").

## See Also

1. [Loginza.Loginza](extras/loginza/loginza.loginza)
2. [tpl.Loginza.login](extras/loginza/tpl.loginza.login)
3. [tpl.Loginza.logout](extras/loginza/tpl.loginza.logout)
4. [tpl.Loginza.profile](extras/loginza/tpl.loginza.profile)