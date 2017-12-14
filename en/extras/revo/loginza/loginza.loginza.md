---
title: "Loginza.Loginza"
_old_id: "918"
_old_uri: "revo/loginza/loginza.loginza"
---

<div>- [Description](#Loginza.Loginza-Description)
- [Usage](#Loginza.Loginza-Usage)
- [Availible properties](#Loginza.Loginza-Availibleproperties)
- [Source code](#Loginza.Loginza-Sourcecode)
- [See Also](#Loginza.Loginza-SeeAlso)

</div>Description
-----------

This is snippet thats login and logout users.

On first login user will be registered. On next logins user profile will be updated by default.

Usage
-----

Call uncached snippet on your page.

```
<pre class="brush: php">
[[!Loginza]]

```Register user to group Users, do not update his profile on next logins and remember him.

```
<pre class="brush: php">
[[!Loginza?
  &groups=`Users`
  &updateProfile=`0`
  &rememberme=`1`
]]

```Availible properties
--------------------

<table><tbody><tr><th>Name</th><th>Description</th><th>Default value</th></tr><tr><td>action   
</td><td>Action of the snippet (login, logout, getProfile, updateProfile, loadTpl)   
</td><td>loadTpl   
</td></tr><tr><td> </td><td> </td><td> </td></tr><tr><td>updateProfile   
</td><td>Update user profile with info from validation service. Fullname, email, date of birth etc.</td><td>1</td></tr><tr><td>rememberme   
</td><td>Remember user? Depends on [session\_cookie\_lifetime](/revolution/2.x/administering-your-site/settings/system-settings/session_cookie_lifetime "session_cookie_lifetime")</td><td>1</td></tr><tr><td>groups   
</td><td>Comma-separated list of existing groups for registering users.   
</td><td>none</td></tr><tr><td> </td><td> </td><td> </td></tr><tr><td>loginTpl   
</td><td>Chunk for not authenticated users with link to login.</td><td>[tpl.Loginza.login](/extras/revo/loginza/tpl.loginza.login "tpl.Loginza.login")  
</td></tr><tr><td>logoutTpl   
</td><td>Chunk for authenticated user with link to logout.</td><td>[tpl.Loginza.logout](/extras/revo/loginza/tpl.loginza.logout "tpl.Loginza.logout")  
</td></tr><tr><td>profileTpl</td><td>Chunk for display and edit user profile</td><td>[tpl.Loginza.profile](/extras/revo/loginza/tpl.loginza.profile "tpl.Loginza.profile")</td></tr><tr><td> </td><td> </td><td> </td></tr><tr><td>saltName   
</td><td>Any string to complicate md5 hash of username md(identity + salt). Without it username will be simple md5 hash of its identity from remote service.</td><td>none</td></tr><tr><td>saltPass   
</td><td>Any string to complicate md5 hash of pass. Without it pass will be simple md5 hash of its identity from remote service.   
</td><td>none</td></tr><tr><td> </td><td> </td><td> </td></tr><tr><td>loginContext   
</td><td>Context to login.</td><td>current context</td></tr><tr><td>addContexts   
</td><td>A comma-separated list of additional contexts to log in to.   
</td><td>none</td></tr><tr><td>profileFields   
</td><td>Comma separated list of allowed user fields for update   
</td><td>username,email,fullname,phone,mobilephone,dob,gender,address,country,city,state,zip,fax,photo,comment,website   
</td></tr><tr><td>requiredFields   
</td><td>Comma separated list of required user fields when update   
</td><td>username,email,fullname   
</td></tr><tr><td> </td><td> </td><td> </td></tr><tr><td>loginResourceId   
</td><td>Resource id to redirect to on successful login. 0 will redirect to self.   
</td><td>0</td></tr><tr><td>logoutResourceId   
</td><td>Resource id to redirect to on successful logout. 0 will redirect to self.   
</td><td>0</td></tr></tbody></table>Source code
-----------

Here is this [snippet on Github](https://github.com/bezumkin/modx-loginza/blob/master/core/components/loginza/elements/snippets/loginza.php).

See Also
--------

1. [Loginza.Loginza](/extras/revo/loginza/loginza.loginza)
2. [tpl.Loginza.login](/extras/revo/loginza/tpl.loginza.login)
3. [tpl.Loginza.logout](/extras/revo/loginza/tpl.loginza.logout)
4. [tpl.Loginza.profile](/extras/revo/loginza/tpl.loginza.profile)