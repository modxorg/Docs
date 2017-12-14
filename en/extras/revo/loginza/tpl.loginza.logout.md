---
title: "tpl.Loginza.logout"
_old_id: "1024"
_old_uri: "revo/loginza/tpl.loginza.logout"
---

<div>- [Description](#tpl.Loginza.logout-Description)
- [Placeholders](#tpl.Loginza.logout-Placeholders)
- [See Also](#tpl.Loginza.logout-SeeAlso)

</div>Description
-----------

This is chunk for authenticated users. It is display full name of logged in user and link to exit.

```
<pre class="brush: php">
Wellcome, [[+fullname]]!
<br/><br/>
<a href='[[+logout_url]]'>Logout</a>
[[+error:notempty=`<div class="alert alert-block alert-error">[[+error]]</div>`]]

```Placeholders
------------

There is no unusual placeholders in this chunk. You can use all placeholders from users profile. [Read more](/revolution/2.x/administering-your-site/security/users "Users").

See Also
--------

1. [Loginza.Loginza](/extras/revo/loginza/loginza.loginza)
2. [tpl.Loginza.login](/extras/revo/loginza/tpl.loginza.login)
3. [tpl.Loginza.logout](/extras/revo/loginza/tpl.loginza.logout)
4. [tpl.Loginza.profile](/extras/revo/loginza/tpl.loginza.profile)